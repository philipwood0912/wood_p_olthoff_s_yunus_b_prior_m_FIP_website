import WidgetComponent from './WidgetComponent.js';
export default {
    template: `
    <div class="learnCon">
    
        <h1 class="hidden">Get The Facts</h1>

        <div class="imgPaddingAbt">
            <img class="animated fadeIn" src="./public/images/factImg1.svg" alt="Fact Information 1" id="factImg1">
        </div>
    
        <div class="imgPaddingAbt">
            <img class="animated fadeIn" src="./public/images/hiv_transmission.png" alt="HIV transmission methods" class="aboutPic">
        </div>
    
        <div class="imgPaddingAbt">
            <img class="animated fadeIn" src="./public/images/didYouKnow.svg" alt="Did You Know?" id="didYouKnow">
        </div>
        <div class="imgPaddingAbt">
            <img class="animated fadeIn" src="./public/images/factImg2.svg" alt="Fact Information 2" id="factImg2">
        </div>
        <div class="imgPaddingAbt">
            <img class="animated fadeIn" src="./public/images/hiv-aids.svg" alt="Hiv& Aids" id="hivAndAids">
        </div>
        <div class="imgPaddingAbt">   
            <img class="animated fadeIn" src="./public/images/factImg3.svg" alt="Fact Information 3" id="factImg3">
        </div>

        <div class="learnPopUp" id="widgetCon">
            <div class="blueBorder">
                <h3 class="popUpTitle">Take the First Step!</h3>
                <p class="popUpSmall">Getting tested for HIV and other common STDs is the first step towards taking control of your overall health. Knowing your status can help keep you and the ones around you safe and healthy.</p>
                <h4 class="popUpSmall">Enter your postal code below to find medical clinics offering free testing in your area.</h4>

                <div id="widget">

                <widget></widget>

                </div>

            </div> 
        </div>
    </div>`,
    components: {
        widget: WidgetComponent
    },
    
}