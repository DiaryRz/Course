<!-- <?php echo $informations->nomequipe  ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            font-family: 'Great Vibes', cursive;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f7f7f7;
        }
        .certificate {
            border: 7px solid #800000;
            /* #8c8c8c */
            padding: 50px;
            width: 950px;
            background: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .certificate:before, .certificate:after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: #800000;
        }
        .certificate:before {
            top: 0;
            left: 0;
            border-bottom-right-radius: 20px;
        }
        .certificate:after {
            bottom: 105;
            right: 0;
            border-top-left-radius: 20px;
        }
        .title {
            color:  ;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .subtitle {
            text-align: center;
            font-size: 20px;
            margin-bottom: 40px;
        }
        .recipient {
            text-align: center;
            font-size: 70px;
            font-family: 'Times New Roman', Times, serif;
            margin-bottom: 40px;
            color:#800000;
        }
        .details {
            text-align: center;
            font-size: 18px;
            margin-bottom: 40px;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
        }
        .signatures div {
            width: 40%;
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="title">CERTIFICATION DE COURSE</div>
        <div class="subtitle">Assigné à :</div>
        <div class="recipient">Equipe <?php echo $informations->nomequipe  ?> </div>
        <div class="details">
        L'équipe <?php echo $informations->nomequipe  ?> s'est distinguée par sa collaboration exceptionnelle, 
        sa détermination sans faille et son esprit d'équipe remarquable tout au long de la compétition.
         Leur travail acharné, leur cohésion et leur engagement collectif ont été exemplaires, 
         inspirant tous les participants.

        <p>Cette victoire témoigne du talent, du dévouement et de la capacité de l'équipe 
            à relever les défis ensemble, en repoussant constamment les limites de leurs performances..
        </p>
        </div>
        <div class="signatures">
            <div>
                <div>Certifier: Mr Dr</div>
                <div>________________</div>
            </div>
            <!-- <div>
                <div>Name</div>
                <div>________________</div>
            </div> -->
        </div>
    </div>
</body>
</html>
