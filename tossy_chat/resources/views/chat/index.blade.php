<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

    <title>チャット画面 TOP</title>

    <style>

        /*以下、①背景色など*/
.line-bc {
  padding: 20px 10px;
  max-width: 450px;
  margin: 15px auto;
  text-align: right;
  font-size: 14px;
  background: #7da4cd;

}

/*以下、②左側のコメント*/
.balloon6 {
  width: 100%;
  margin: 10px 0;
  overflow: hidden;
}

.balloon6 .faceicon {
  float: left;
  margin-right: -50px;
  width: 40px;
}

.balloon6 .faceicon img{
  width: 100%;
  height: auto;
  border-radius: 50%;
}
.balloon6 .chatting {
  width: 100%;
  text-align: left;
}
.says {
  display: inline-block;
  position: relative; 
  margin: 0 0 0 50px;
  padding: 10px;
  max-width: 250px;
  border-radius: 12px;
  background: #edf1ee;
}

.says:after {
  content: "";
  display: inline-block;
  position: absolute;
  top: 3px; 
  left: -19px;
  border: 8px solid transparent;
  border-right: 18px solid #edf1ee;
  -webkit-transform: rotate(35deg);
  transform: rotate(35deg);
}
.says p {
  margin: 0;
  padding: 0;
}

/*以下、③右側の緑コメント*/
.mycomment {
  margin: 10px 0;
}
.mycomment p {
  display: inline-block;
  position: relative; 
  margin: 0 10px 0 0;
  padding: 8px;
  max-width: 250px;
  border-radius: 12px;
  background: #30e852;
  font-size: 15px:
}

.mycomment p:after {
  content: "";
  position: absolute;
  top: 3px; 
  right: -19px;
  border: 8px solid transparent;
  border-left: 18px solid #30e852;
  -webkit-transform: rotate(-35deg);
  transform: rotate(-35deg);
}

    </style>

</head>

  <body class="w-4/5 md:w-3/5 lg:w-2/5 m-auto">
        <h1 class="my-4 text-3xl font-bold" style="text-align:center;">Tossy_Chat（2023 03）</h1>
        <div class="my-4 p-4 rounded-lg bg-blue-200">
            <div class="line-bc"><!--①LINE会話全体を囲う-->
            <ul style="list-style-type: none;">
                @foreach($chats as $c_item)

                    @if($c_item->user_identifier == session('user_identifier')):
                        <p style="text-align: left !important;">本人:{{ $c_item->ShowData() }}</p>
                        <li>
                                
                             <!--②左コメント始-->
                            <div class="balloon6">
                                <div class="faceicon">
                                ★ここにアイコン画像 <img~>★
                                </div>
                                <div class="chatting">
                                <div class="says">
                                    <p>{{ $c_item->message}}</p>
                                </div>
                                </div>
                            </div>
                            <!--②/左コメント終-->
                        </li>


                    @else:
                        <p>他ユーザー:{{ $c_item->ShowData() }}</p>
                        <li>
                              <!--③右コメント始-->
                                <div class="mycomment">
                                    <p>
                                   {{ $c_item->message}}
                                    </p>
                                </div>
                                <!--/③右コメント終-->
                        
                        </li>
                    @endif

                  
                    
                @endforeach
            </ul>
            
            </div>

            <p>{{ $user_identifier }}</p>

        
            
           
        </div>
        <form class="my-4 py-2 px-4 rounded-lg bg-gray-300 text-sm flex flex-col md:flex-row flex-grow" action="chat" method="POST">
            @csrf

            <!-- user 識別子 -->
            <input type="hidden" name="user_identifier" value="{{session('user_identifier')}}">

            <input class="py-1 px-2 rounded text-center flex-initial" type="text" name="user_name" placeholder="ユーザー名" maxlength="50" value="{{session('user_name')}}" required>

         
             <!--
             <input class="py-1 px-2 rounded text-center flex-initial" type="text" name="user_name" placeholder="ユーザー名" maxlength="50">
             -->

             <!--
            <input class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto" type="text" name="message" placeholder="メッセージ" maxlength="255">
             -->

            <input class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto" type="text" name="message" placeholder="メッセージ" maxlength="255" autofocus>

            <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-gray-500 text-white" type="submit">投稿</button>
        </form>
    </body>

</html>