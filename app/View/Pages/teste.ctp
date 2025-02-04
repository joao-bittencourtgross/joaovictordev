<?PHP
//echo phpinfo();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title></title>


    <style>
        .wrapper {
            position: relative;
            width: 250px;
            height: 367px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        img {
            position: absolute;
            left: 0;
            top: 0;
        }

        .signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width:250px;
            height:367px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <img src="Hatch.jpg" width=250 height=367 />
    <canvas id="signature-pad" class="signature-pad" width=250 height=367></canvas>
</div>
<div>
    <button id="save">Save</button>
    <button id="clear">Clear</button>
</div>

<form action="">
    <textarea name="" id="imageCheck" cols="30" rows="10"></textarea>
</form>


</body>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@3.0.0-beta.3/dist/signature_pad.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script>
    function download(dataURL, filename) {
        if (navigator.userAgent.indexOf("Safari") > -1 && navigator.userAgent.indexOf("Chrome") === -1) {
            window.open(dataURL);
        } else {
            var blob = dataURLToBlob(dataURL);
            var url = window.URL.createObjectURL(blob);

            var a = document.createElement("a");
            a.style = "display: none";
            a.href = url;
            a.download = filename;

            document.body.appendChild(a);
            a.click();

            window.URL.revokeObjectURL(url);
        }
    }

    function dataURLToBlob(dataURL) {
        // Code taken from https://github.com/ebidel/filer.js
        var parts = dataURL.split(';base64,');
        var contentType = parts[0].split(":")[1];
        var raw = window.atob(parts[1]);
        var rawLength = raw.length;
        var uInt8Array = new Uint8Array(rawLength);

        for (var i = 0; i < rawLength; ++i) {
            uInt8Array[i] = raw.charCodeAt(i);
        }

        return new Blob([uInt8Array], { type: contentType });
    }


    var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });


    var saveButton = document.getElementById('save');
    var cancelButton = document.getElementById('clear');



    saveButton.addEventListener("click", function(event) {
        if (signaturePad.isEmpty()) {
            alert("Faça sua assinatura.");
        } else {
            var dataURL = signaturePad.toDataURL();
            //download(dataURL, "signature.png");
            //alert(dataURL);
            $("#imageCheck").val(dataURL);
        }
    });

    cancelButton.addEventListener('click', function(event) {
        signaturePad.clear();
    });

</script>
</html>