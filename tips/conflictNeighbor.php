<?php
session_start();
?>
<?php
$url = "";
$url != 'conflictNeighbor.php';

if ($_SERVER['HTTP_REFERER'] == $url) 
{
  header('Location: ../C_profile.php'); //redirect to some other page
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>R & R | Incident Reporting</title>
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tips.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body>

    <nav>
        <?php
            include_once('Userheader.php');
        ?>
    </nav>
    <br>
    <br>
    <div class="hpFirstSection">
        <div class="hpFirst">
            <div class="hfprb">
            <div class="hpFirstleftborder">
                <br>
                <br>
                <p id="tipsB">Tips and Contacts</p>
                <hr>
                <p id="tipsB">Tips to Prevent Neighborhood Conflict or Community Conflict</p>
                <p id="tipsC"">Your behavior affects your neighbors, just as what they do effects you. The key way to prevent conflict with neighbors is to be a good neighbor yourself. Simple consideration and conversation with neighbors helps achieve a peaceful coexistence.</p>
                <hr>
                <p id="tipsB">Here are several suggestions for preventing conflicts:</p>
                <br>
                
                    <p id="tipsC"><b>Meet your neighbor</b></br> Introduce yourself while walking the dog or when you see moving boxes arrive. Learn your neighbors’ names and regularly say “hello” or “Good Morning” before there is any need or problem. Just knowing them can prevent conflict.
</p></br>
                    <p id="tipsC"><b>Keep your neighbors informed</b></br> Contact them before undertaking something that might affect them – such as hosting a big party, building a fence, cutting down a tree or getting a puppy. Informing your neighbors ahead of time allows them to make plans or tell you how your project affects them. Getting their input lets you act in a way that avoids problems.
</p></br>
                    <p id="tipsC"><b>Be aware of differences</b></br> Differences in age, ethnic backgrounds, years in the neighborhood, etc. can lead to conflicting expectations or misunderstandings unless we make an effort to talk with and understand each other. Focus on what you have in common with your neighbor.
</p></br>
                    <p id="tipsC"><b>Consider your neighbor’s point of view, literally</b> How does your compost pile, play equipment or son’s car parts look from your neighbors’ backyard or windows? Keep areas in others’ view reasonably presentable.
</p></br>
                    <p id="tipsC"><b>Be appreciative</b></br> If a neighbor does something you like, tell them! They’ll be pleased to hear you noticed the yard work or the new paint job – and it will be easier to talk later if they do something you don’t like.
</p></br>
                    <p id="tipsC"><b>Be positive</b></br> If your neighbor does something that irritates you, don’t assume it was on purpose. Most people don’t intentionally try to create problems. Presume the neighbor doesn’t know about the annoyance. If we jump to the conclusion that the other person is the enemy, we decrease the possibility of an easy resolution.
</p></br>
                    <p id="tipsC"><b>Be candid</b></br> If your neighbors do something that bothers you, let them know. By communicating early and calmly, you take a step toward solving the problem. Be tolerant but don’t let a real irritation go because it seems unimportant or hard to discuss. Your neighbor won’t know the situation bothers you. It may grow worse, or become harder to talk about, as time goes on.
</p></br>
                    <p id="tipsC"><b>Be respectful</b></br> Talk directly with the neighbor involved about a problem situation. Don’t gossip; that damages relationships and creates trouble.
</p></br>
                    <p id="tipsC"><b>Be calm</b></br> If a neighbor approaches you accusingly about a difficulty, listen carefully and thank them for telling you how they feel. You don’t have to agree or justify your behavior. If you can listen and not react defensively, then their anger subsides, the lines of communication remain open and there is a good chance of working things out.
</p></br>
                    <p id="tipsC"><b>Listen well</b></br> When you discuss a problem, try to understand how your neighbor feels about the issue and why. Understanding is not the same as agreeing, will increase the likelihood of a solution that works for you both.
</p></br>
                    <p id="tipsC"><b>Take your time</b></br> If you need to, take a break to think about what you and your neighbor have discussed. Arrange to finish the conversation later, and then do so. Beginning something and not following through can start a problem or make one worse.
</p></br>
                    <p id="tipsC"><b>Get help when needed</b></br> Communication can resolve conflict, and talking things over is the best way to handle problems and avoid enforcement or the courts. But at times you may need the help of a neutral third part trained in conflict resolution. If it seems that your efforts to communicate with a neighbor are not resolving the issue, do not hesitate to call Local Barangay
</p></br>
                
            </div>
</div>
        </div>
    </div>
    
   
</body>
</html>



