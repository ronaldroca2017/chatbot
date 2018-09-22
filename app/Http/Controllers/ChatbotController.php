<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Google\Cloud\Dialogflow\V2\AgentsClient;
use Google\Cloud\Dialogflow\V2\EntityTypesClient;

use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;

use IronMQ\IronMQ;

class ChatbotController extends Controller
{
    private $ironmq;
    private $queue_name;
    
    function __construct(){
        $keystone = [
            "server" => "http://mq-aws-eu-west-1-1.iron.io",
        ];
        
        $this->ironmq = new IronMQ([
            "token" => env('IRON_TOKEN'),
            "project_id" => env('IRON_PROJECT_ID'),
            "keystone" => $keystone,
        ]);
        
        $this->queue_name = env('IRON_QUEUE_NAME');
    }
    
    public function get( Request $request ){
        $text = $request->get("text");
        $responseJSON = [];
        
        if ( ! empty ( $text ) ) {
            $test = array('credentials' => env("GOOGLE_APPLICATION_CREDENTIALS"));
            $projectId = env('DIALOGFLOW_PROJECT_ID');
            $sessionId = 123456;
            
            $languageCode = 'es-ES';
            $sessionsClient = new SessionsClient($test);
            $session = $sessionsClient->sessionName($projectId, $sessionId ?: uniqid());
         
            // create text input
            $textInput = new TextInput();
            $textInput->setText($text);
            $textInput->setLanguageCode($languageCode);
         
            // create query input
            $queryInput = new QueryInput();
            $queryInput->setText($textInput);
         
            // get response and relevant info
            $response = $sessionsClient->detectIntent($session, $queryInput);
            $queryResult = $response->getQueryResult();
            
            /*$queryText = $queryResult->getQueryText();
            $intent = $queryResult->getIntent();
            $displayName = $intent->getDisplayName();
            $confidence = $queryResult->getIntentDetectionConfidence();*/
            
            $responseText = $queryResult->getFulfillmentText();
            
            $this->ironmq->postMessage($this->queue_name, $responseText);
            
            array_push($responseJSON, $responseText);
            
            $sessionsClient->close();
        }
        
        return response()->json($responseJSON);
    }
}
