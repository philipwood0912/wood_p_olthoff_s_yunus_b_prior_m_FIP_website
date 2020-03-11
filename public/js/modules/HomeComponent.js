export default {
    template: `
<div id="homeCon"> 
    <h1 class="hidden"> Home Page </h1>

    <div id="heroCon"> 
        <img src="./public/images/heroImgWeb.svg" alt="hero image with text" id="heroImage">

        <i class="fas fa-chevron-down fa-3x" id="chevronDown"></i>
    </div>

    <div id="popUpCon">

        <div class="popUpLeft" id="popUp1">
            <div class="blueBorder">
                <h3 class="pinkTitle">Get Yourself Tested!</h3>

                <p class="smBlueText">Knowing Your HIV and STD status helps you choose options to stay healthy!</p>
            </div>
        </div>

        <div class="popUpRight" id="popUp2">
            <div class="blueBorder">
                <h3 class="pinkTitle">Talk About PeEP!</h3>

                <p class="smBlueText">Talk to your doctor abuot pre-exposure prophylaxis (PrEP) as it can greatly reduce your risk of infection. </p>
            </div>
        </div>

        <div class="popUpLeft" id="popUp3">
            <div class="blueBorder">
                <h3 class="pinkTitle">Use A Condom!</h3>

                <p class="smBlueText">Condoms are highly effective at preventing both HIV, AIDS and other STDs.</p>
            </div>
        </div>

        <div class="popUpRight" id="popUp4">
            <div class="blueBorder">
                <h3 class="pinkTitle">HIV Treatment!</h3>

                <p class="smBlueText">HIV treatment keeps you healthy and minimizes the risk of spreading the disease to others.</p>
            </div>
        </div>

        <div class="popUpLeft" id="popUp5">
            <div class="blueBorder">
                <h3 class="pinkTitle">Don't Inject Drugs!</h3>

                <p class="smBlueText">But if you do,only use sterile equiptment and water. Most importantly, never share your gear!</p>
            </div>
        </div>
        
    </div>

    <button class="button"> <span class="buttonTxt">Get The Facts</span></button>

</div>


    `
}