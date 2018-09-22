<!DOCTYPE html>
<html>
    <head>
        <title>Chatbot</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        
        <link href="/css/main.css" rel="stylesheet" type="text/css">
        <link href="/css/messenger-default.css" rel="stylesheet" type="text/css">
        <link href="/css/classic.css" rel="stylesheet" type="text/css">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <style>
            body {
                display: block;
                margin: 8px;
                font-family: 'Lato';
                background-color: #e9ebee;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                text-rendering: optimizeLegibility;
            }
        </style>
    </head>
    <body>
        <div class="wpcb-wrapper">
    <div id="wpcb" class="container-fluid">
      <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <div id="wpcb-chatbox">
                <div class="row no-gutters">

                    <!-- Left Part of the chatbox -->
                    <div id="wpcb-left" class="col-sm-3 d-none d-md-block">
                        <div id="wpcb-bot">
                            <p class="wpcb-avatar"><img src="/images/chatbot.jpg" class="wpcb-bot-avatar" /></p>
                            <p class="wpcb-name"><strong>John</strong></p>
                            <p class="wpcb-status"><span class="wpcb-online-badge"></span> Online</p>
                            <p class="wpcb-bio">Hola soy John, chatea conmigo.</p>
                        </div>
                    </div>
                    
                    <!-- Right Part of the chatbox -->
                    <div id="wpcb-right" class="col-sm-12 col-md-9">
                        
                        <!-- Top Sidebar -->
                        <div id="wpcb-conversation-top" class="container-fluid d-sm-block d-md-none">
                            <div class="row">
                                <div class="col-xs-2 hidden-lg-up">
                                    <img src="https://wpchatbot.io/demo/official/wp-content/uploads/2017/08/image-2.png" class="img-fluid wpcb-bot-avatar-square" />
                                </div>
                                <div class="col-xs-10">
                                    <div id="wpcb-to-field">
                                        <div class="hidden-lg-up" style="display:inline-block;"><span class="wpcb-online-badge"></span></div>
                                        <span class="wpcb-to-label">To:</span> 
                                        <span class="wpcb-to-name">John</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Main Conversation -->
                        <div id="wpcb-main-conversation">
                            <div id="wpcb-conversation-start">
                                <span>Hoy, 1:49 am</span>
                            </div>
                            <div id="wpcb-conversation-content">

                                <!-- Bot Bubble's Template -->
                                <div id="wpcb-template-bot-bubble" style="display: none;">
                                    <div class="wpcb-bubble bot" style="display: none;">%%content%%</div>
                                </div>
                                <!-- / end -->

                                <!-- Bot Bubble's Template -->
                                <div id="wpcb-template-human-bubble" style="display: none;">
                                    <div class="wpcb-bubble human" style="display: none;">%%content%%</div>
                                </div>
                                <!-- / end -->

                            </div>
                        </div>
                        
                        <!-- User field -->
                        <div id="wpcb-user-field">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="wpcb-your-reply-bar">
                                        <span class="wpcb-question-title"></span>
                                    </div>
                                    <div id="wpcb-choices" style="display:none;"></div>
                                    <div id="wpcb-waiting-for-label">
                                        <div style="padding: 0 2%;">
                                            <input type="text" class="inputTextChat"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promote WPChatbot -->
        
      </div>
    </div>
</div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
