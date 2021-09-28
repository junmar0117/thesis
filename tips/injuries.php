<?php
session_start();
?>
<?php
$url = "";
$url != 'injuries.php';

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
<body style="background-color: #ffffff;">

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
                <p id="tipsB">Wounds first aid</p>
                <p id="tipsC">A wound is any damage or break in the surface of the skin. Applying appropriate first aid to a wound can speed up the healing process and reduce the risk of infection. Wounds including minor cuts, lacerations, bites and abrasions can be treated with first aid. </p>
                <br>
                <ul>
                    <p id="tipsC"><b>Control bleeding</b>
                    Use a clean towel to apply light pressure to the area until bleeding stops (this may take a few minutes). Be aware that some medicines (e.g. aspirin and warfarin) will affect bleeding, and may need pressure to be applied for a longer period of time.
</p>
                    <p id="tipsC"><b>Wash your hands well</b>
                    Prior to cleaning or dressing the wound, ensure your hands are washed to prevent contamination and infection of the wound.
</p>
                    <p id="tipsC"><b>Rinse the wound</b>
                    Gently rinse the wound with clean, lukewarm water to cleanse and remove any fragments of dirt, e.g. gravel, as this will reduce the risk of infection.
</p>
                    <p id="tipsC"><b>Dry the wound</b>
                    Gently pat dry the surrounding skin with a clean pad or towel.
</p>
                    <p id="tipsC"><b>Replace any skin flaps if possible</b>
                    If there is a skin flap and it is still attached, gently reposition the skin flap back over the wound as much as possible using a moist cotton bud or pad.
</p>
                    <p id="tipsC"><b>Cover the wound</b>
                    Use a non-stick or gentle dressing and lightly bandage in place; try to avoid using tape on fragile skin to prevent further trauma on dressing removal.
</p>
                    <p id="tipsC"><b>Seek help</b>
                    Contact your GP, nurse or pharmacist as soon as possible for further treatment and advice to ensure the wound heals quickly.
</p>
                    <p id="tipsC"><b>Manage pain</b>
                    Wounds can be painful, so consider pain relief while the wound heals.  Talk to your GP about options for pain relief.
</p>
                </ul>
                <hr>
                <p id="tipsB">Where to get help</p>
                <p id="tipsC">See your doctor or nurse if the wound:</p>
                <ul>
                    <p id="tipsC">shows signs of infection
</p>
                    <p id="tipsC">continues to bleed
</p>
                    <p id="tipsC">you are unable to realign the skin
</p>
                    <p id="tipsC">has dirt, glass, a thorn or other foreign body in the wound
</p>
                    <p id="tipsC">seems large or deep
</p>
                    <p id="tipsC">is not healing, or is very slow to heal (e.g. not healed after 4 weeks)
</p>                
                </ul>
                <p id="tipsC">Or if:</p>
                <ul>
                    <p id="tipsC">you have an underlying medical condition
</p>
                    <p id="tipsC">you have another injury or hit your head at the time of the injury (you may have a concussion or fracture)
</p>
                    <p id="tipsC">there is a risk of further injury
</p>
                    <p id="tipsC">you are unsure how to manage the wound, or have any concerns.
</p>
                </ul>
                <hr>
                <p id="tipsB">Learn the first aid method of DRSABCD</p>
                <p id="tipsC">First aid is as easy as ABC – airway, breathing and CPR (cardiopulmonary resuscitation). In any situation, apply the DRSABCD Action Plan.</p>
                <p id="tipsC">DRSABCD stands for:</p>
                <ul>
                    <p id="tipsC"><b>Danger</b> – always check the danger to you, any bystanders and then the injured or ill person. Make sure you do not put yourself in danger when going to the assistance of another person.  
                    </li><b>Response</b> – is the person conscious? Do they respond when you talk to them, touch their hands or squeeze their shoulder?
                    <p id="tipsC"><b>Send for help</b> – call triple zero (000). Don’t forget to answer the questions asked by the operator.
                    </li><b>Airway</b> – Is the person’s airway clear? Is the person breathing?
                    <p id="tipsC"><b>If the person is responding,</b> they are conscious and their airway is clear, assess how you can help them with any injury.
                    </li><b>If the person is not responding and they are unconscious,</b> you need to check their airway by opening their mouth and having a look inside. If their mouth is clear, tilt their head gently back (by lifting their chin) and check for breathing. If the mouth is not clear, place the person on their side, open their mouth and clear the contents, then tilt the head back and check for breathing.
                    <p id="tipsC"><b>Breathing</b> – check for breathing by looking for chest movements (up and down). Listen by putting your ear near to their mouth and nose. Feel for breathing by putting your hand on the lower part of their chest. If the person is unconscious but breathing, turn them onto their side, carefully ensuring that you keep their head, neck and spine in alignment. Monitor their breathing until you hand over to the ambulance officers.
                    </li>
                    <p id="tipsC"><b>CPR (cardiopulmonary resuscitation)</b> – if an adult is unconscious and not breathing, make sure they are flat on their back and then place the heel of one hand in the centre of their chest and your other hand on top. Press down firmly and smoothly (compressing to one third of their chest depth) 30 times. Give two breaths. To get the breath in, tilt their head back gently by lifting their chin. Pinch their nostrils closed, place your open mouth firmly over their open mouth and blow firmly into their mouth. Keep going with the 30 compressions and two breaths at the speed of approximately five repeats in two minutes until you hand over to the ambulance officers or another trained person, or until the person you are resuscitating responds. The method for CPR for children under eight and babies is very similar and you can learn these skills in a CPR course.
                    </li>
                    <p id="tipsC"><b>Defibrillator</b> – for unconscious adults who are not breathing, apply an automated external defibrillator (AED) if one is available. They are available in many public places, clubs and organisations. An AED is a machine that delivers an electrical shock to cancel any irregular heart beat (arrhythmia), in an effort get the normal heart beating to re-establish itself. The devices are very simple to operate. Just follow the instructions and pictures on the machine, and on the package of the pads, as well as the voice prompts. If the person responds to defibrillation, turn them onto their side and tilt their head to maintain their airway. Some AEDs may not be suitable for children.
                   
                </ul>
                <hr>
                <p id="tipsB">Where to learn first aid and CPR</p>
                <p id="tipsC">You can attend a CPR training course or first aid course with a non-profit organisation such as St John Ambulance Australia (Victoria), Australian Red Cross and Life Saving Victoria. St John also runs awareness programs in schools and the community.</p>
                <p id="tipsC">There is no age limit to learning CPR. The ability to carry out CPR is only limited by the physical capabilities of the person carrying out the procedure.</p>
                <p id="tipsC">In some schools, CPR is a module of the first aid course taught to Year 9 students. CPR is a life skill that everyone should learn. Remember that doing some CPR in an emergency is better than doing nothing.</p>
                <hr>
                <p id="tipsB">Infection control when performing CPR</p>
                <p id="tipsC">To avoid contact with potentially infectious bodily fluids such as blood or saliva, everyone with training in resuscitation is advised to carry a resuscitation mask in their purse, wallet or first aid kit. This helps take the worry of infection out of helping someone in a life-threatening situation. These masks are available from first aid providers or from your pharmacy.</p>
                <hr>
                <p id="tipsB">First aid for a person choking</p>
                <p id="tipsC">Maintaining a clear airway is always the priority to make sure the person can keep breathing. You might need to roll them onto their side, but spinal injury is always a possibility in anyone involved in an accident. There are ways of placing an injured person on their side so that there is very little movement to their spine. You can learn these skills in a first aid course.</p>
                <hr>
                <p id="tipsB">First aid for a medication or drug overdose</p>
                <p id="tipsC">Medications are very unpredictable. Many medications or illicit drugs have dangerous side effects, particularly if they are mixed together or taken with alcohol.</p>
                <p id="tipsC">If you are aware or suspect that someone you have found has overdosed on drugs or medications, do not leave them to ‘sleep it off’. A doctor or ambulance paramedic should assess any person who overdoses on any medication.
                </p>
                <p id="tipsC">It is very important that you call triple zero (000) if you are aware or suspect that someone you have found has overdosed on drugs or medications, as many overdoses cause death.</p>
                <hr>
                <p id="tipsB">First Aid Kit</p>
                <p id="tipsC">As well as knowing some basic first aid techniques, it is important that households and workplaces have a first aid kit that meets their needs and is well organised, fully stocked and readily available at all times.</p>
                <p id="tipsC">The contents should be appropriate to cope with a range of emergency situations, depending on the setting. It’s a good idea to have a number of kits handy in different places, such as in the home, car or office.</p>
                <p id="tipsC">First aid kits are available for purchase from a variety of providers, including St John Ambulance Australia (Victoria) or your local pharmacy. Specialty kits are also available to meet specific needs.</p>
                <hr>
                <p id="tipsB">Reducing the risk of infected wounds during first aid</p>
                <p id="tipsC">Open wounds are prone to infection. Suggestions to reduce the risk of infection include:</p>
                <ul>
                    <p id="tipsC">Wash your hands if possible before managing the wound. You could also use an antibacterial hand sanitiser.
</p>
                    <p id="tipsC">Put on the disposable gloves provided in your first aid kit.
</p>
                    <p id="tipsC">Try to avoid breathing or coughing over the wound.
</p>
                    <p id="tipsC">Cleaning of the wound depends on the type and severity of the wound, including the severity of the bleeding. You may just clean around the wound.
</p>
                    <p id="tipsC">Cover the wound with a sterile dressing. Try not to touch the dressing’s surface before applying it to the wound.
</p>
                    <p id="tipsC">Seek medical advice or call triple zero (000) for an ambulance.
</p>
                </ul>
                <p id="tipsC">In an emergency, these suggestions may not be practical. If the injured person is bleeding heavily, don’t waste time. For example, cleaning the wound might dislodge a blood clot and make the wound bleed again or bleed more.</p>
                <p id="tipsC">Immediately apply pressure to a heavily bleeding wound (or around the wound if there is an embedded object), and apply a bandage when the bleeding has slowed down or stopped. Call triple zero (000) immediately.</p>
                <hr>
                <p id="tipsB">Using bandages during first aid</p>
                <p id="tipsC">This information is of a general nature only and should not be considered a replacement for proper first aid training.</p>
                <p id="tipsC">General suggestions include:</p>
                <ul>
                    <p id="tipsC">The injured person should be sitting or lying down. Position yourself in front of the person on their injured side.
</p>
                    <p id="tipsC">Make sure their injured body part is supported in position before you start to bandage it.
</p>
                    <p id="tipsC">If the injured person can help by holding the padding in place, wrap the ‘tail’ of the bandage one full turn around the limb, so that the bandage is anchored.
</p>
                    <p id="tipsC">If there is no assistance, wrap the ‘tail’ of the bandage directly around the padding over the wound.
</p>
                    <p id="tipsC">Bandage up the limb, making sure each turn overlaps the turn before. Alternatively, you can bandage in a ‘figure eight’ fashion.
</p>
                    <p id="tipsC">Make sure the bandage isn’t too tight so you don’t reduce blood flow to the extremities (hands and feet). Check by pressing on a fingernail or toenail of the injured limb – if the pink colour returns within a couple of seconds, the bandage isn’t affecting the person’s circulation. If the nail remains white for some time, loosen the bandage. Keep checking and adjusting the bandage, especially if swelling is a problem.
</p>
                </ul>
                <hr>
                <p id="tipsB">Making an arm sling</p>
                <p id="tipsC">After being bandaged, an injured forearm or wrist may require an arm sling to lift the arm and keep it from moving. Steps include:</p>
                <ul>
                    <p id="tipsC">Arrange the person’s arm in a ‘V’ so that it is held in front of their body and bent at the elbow, with the hand resting in the hollow where the collarbone meets the shoulder.
</p>
                    <p id="tipsC">Open a triangular bandage and place it on top of the injured arm. The longest edge needs to be lengthwise along the person’s body and the point of the bandage should be towards the person’s elbow on their injured side. You only need enough material to tie a knot at the fingertip end.
</p>
                    <p id="tipsC">Create a cradle (hammock) around the injured arm by folding the upper half of the long edge under the injured arm.
</p>
                    <p id="tipsC">Gently gather the material together at the elbow and pull it tight without pulling the bandage off the injured arm. Twist the material into a long spiral.
</p>
                    <p id="tipsC">Bring the long spiral around and then up the person’s back.
</p>
                    <p id="tipsC">Tie the two ends together firmly at the person’s fingertips.
</p>
                </ul>
            </div>
</div>
        </div>
    </div>
    
   
</body>

</html>



