<!-- Scritto da: Antonio Gravina, Mattia Siragusa -->
<!DOCTYPE html>
<html>
<head>
    <title>ILovePizza</title>
</head>
<body class="body">
    <section id="mail" style="align self: center; width: fit-content; height: fit-content; border: solid; margin-left: 4%; 
    border-color: #000000; border-top: #107503 solid; border-right: #107503 solid; border-radius: 15px; 
    padding: 1px; background-color: rgb(245, 237, 237);">
    <h1 style="font-size: 180%; font-weight: bold;text-align: center;">{{ $details['title'] }}</h1>
    <p style ="text-align: center; font-family: arial; margin-top: 5%;">Per visitare l'associazione visita il seguente link: <br> 
    <a style=" color: #000000;
       font-size: 15px; font-weight: bold; margin-top: 3%; border-radius: 5px;
       background-color: rgb(248, 248, 237); border: solid; border color: #000000; 
       border-top:  #107503 solid; border-right: #107503 solid;
       margin-bottom: 3%;" href="http://{{ $details['body']}}">Visita ora</a> <br>
    </p>
</section>
</body>
</html>