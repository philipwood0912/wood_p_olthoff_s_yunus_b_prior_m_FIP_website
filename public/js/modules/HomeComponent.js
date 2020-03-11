export default {
    template: `
<div id="homeCon"> 
    <h1 class="hidden"> Home Page </h1>

    <div id="heroCon"> 
        <img src="./public/images/heroImage.svg" alt="hero image with text" id="heroImage">

        <i class="fas fa-chevron-down fa-3x" id="chevronDown"></i>
    </div>

    <div id="popUpCon">

        <div class="popUpLeft" id="popUp1">
            <p>1</p>
        </div>

        <div class="popUpRight" id="popUp2">
            <p>2</p>
        </div>

        <div class="popUpLeft" id="popUp3">
            <p>3</p>
        </div>

        <div class="popUpRight" id="popUp4">
            <p>4</p>
        </div>

        <div class="popUpLeft" id="popUp5">
            <p>5</p>
        </div>
        
    </div>

    <button class="button"> <span class="buttonTxt">Get The Facts</span></button>

</div>


    `
}