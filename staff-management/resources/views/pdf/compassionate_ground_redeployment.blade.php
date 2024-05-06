<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compassionate Ground Redeployment</title>
</head>
<body>
<strong>Internal Memo</strong>
<hr size="2" color="black" width="70%">
<strong>DATE :</strong> <p>{{$staff-> effectivedeploymentdate}} ,</p>	


<strong>TO : </strong>	<p>{{$staff-> othername}} {{$staff-> surname}} - {{$staff-> id}}</p>

<strong>FROM : </strong>	Human Capital Management

<strong>SUBJECT : </strong>	{{$staff-> redeploymenttype}}
<hr size="2" color="black" width="70%">


<p>After a careful consideration and in recognition of your needs, management has approved your redeployment on <strong>{{$staff-> redeploymenttype }}</strong> to <strong>{{$staff-> newdepartment}}</strong> as a <strong>{{$staff-> newrole }}</strong> in <strong>{{ $staff-> newregion }}</strong>. This is effective from <strong>{{$staff-> effectivedeploymentdate}}</strong>.</p>


<p>You are to report to the <strong>{{ $staff-> newreportinglinerole }}</strong> , who will brief you on your                   responsibilities and duties. You will be given your job description containing your job scope, performance target, and key performance indicators being the PHED parameter in measuring your performance on the task month to month.</p>

<p>Kindly acknowledge a copy of this letter and submit otherdocuments and properties in your custody to Human Capital Management (HCM).</p>

<p>We are confident that you find your new role and responsibility encouraging and challenging to the task ahead, as PHED always expects the best from you.</p>

<p>Signed:</p>

<p>Ag. Chief People Officer</p>

</body>
</html>