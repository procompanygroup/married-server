<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .center {
            text-align: center
        }

        .fsize {
            font-size: 20px;
        }

        .ver-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            color: white !important;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
    <title>رسالة التحقق</title>
</head>

<body class="center">
    <h1 class="center">😀 يرجى التحقق من بريدك الإلكتروني </h1>
    <p class="center fsize" dir="rtl"><span> لاستكمال عملية انشاء الحساب في </span><span> <a
                href="{{ route('site.home') }}">{{ config('app.name') }} </a></span><span>، انقر فوق زر <strong>التحقق
                من
                حسابي</strong> للانتقال الى صفحة التحقق ثم ادخل رمز التحقق. يساعد هذا في الحفاظ على أمان حسابك.</span>
    </p>
    <P class="center fsize">
        :رمز التحقق الخاص بك هو
    </P>
    <P class="center fsize">
        <strong>{{ $data['code'] }}</strong>
    </P><a class="ver-button" href="{{ route('verify.index') }}">التحقق من حسابي</a></p>
    <p class="center">لقد تلقيت هذا البريد الإلكتروني لأن لديك حسابًا في {{ config('app.name') }}. إذا لم تكن متأكدًا من
        سبب تلقي هذا البريد الإلكتروني، فيرجى الاتصال بنا بالرد على هذا البريد الإلكتروني.</p>
</body>

</html>
