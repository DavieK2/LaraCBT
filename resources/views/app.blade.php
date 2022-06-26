<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        body{
            
            font-family: 'Roboto', sans-serif;
        }
        .scrollbar-primary::-webkit-scrollbar {
            width: 5px;
            height: 5px;
            display: none;
            overflow-x: hidden;
            background-color: #020da729;
        }
  
        .scrollbar-primary::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #1e62eb;
            display: none;
            overflow-x: hidden;
  
        }
  
        .scrollbar-info::-webkit-scrollbar {
            width: 5px;
            height: 5px;
            overflow-x: hidden;
            background-color: #020da729;
        }
  
        .scrollbar-info::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #1e62eb;
            overflow-x: hidden;
  
        }
  
    </style>
  </head>
  <body class="min-h-screen w-full bg-gray-100 relative">
    @inertia
  </body>
</html>