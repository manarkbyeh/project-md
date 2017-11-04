


<html>
<head>
    <title>MunchDaily verzoek</title>
</head>
<body>

Beste {{ $user_giver['name'] }}, <br/>
<br/>
{{ $user_reciever['name'] }} heeft verzocht om {{$article['title']}} bij jou te komen afhalen. <br/>
{{ $user_reciever['name'] }} zou dit graag doen op: {{$transaction['datum']}} om: {{$transaction['uur']}} <br/>
Dit is het bericht dat werd achtergelaten voor u: {{$transaction['comment']}} <br/>

U kunt een reactie terugsturen naar het email adres: {{ $user_reciever['email'] }} . <br/>
<br/>
Dit is transactie #{{$transaction['id']}}
<br>
Groeten, <br/>
<br/>
Team MunchDaily


</body>
</html>