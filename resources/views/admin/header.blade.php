<!-- Google Web Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

<style>
    #overlay{
        display:none;
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background-color:rgba(0,0,0,0.5);
        z-index:1;
    }

    #message{
        position:fixed;
        top:48%;
        left:50%;
        transform:translate(-50%, -50%);
        background-color:#06BBCC;
        color:white;
        padding:10px;
        display:none;
        z-index:2;
        text-align:center;
        font-size:18px;
    }

    .col-form-label{
        font-weight:bold;
    }
    form .error {
    color: #ff0000;
    }
</style>