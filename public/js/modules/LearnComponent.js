import WidgetComponent from './WidgetComponent.js';
export default {
    template: `
    <div class="learnCon">
    
        <h1 class="hidden">Get The Facts</h1>
        <img src="./public/images/factImg1.svg" alt="Fact Information 1" id="factImg1">

    
        <div id="imgCon">
            <img src="./public/images/hiv_transmission.svg" alt="HIV transmission methods" class="threeicons">
        </div>
    
    
        <img src="./public/images/didYouKnow.svg" alt="Did You Know?" id="didYouKnow">

        <img src="./public/images/factImg2.svg" alt="Fact Information 2" id="factImg2">

        <img src="./public/images/hiv-aids.svg" alt="Hiv& Aids" id="hivAndAids">
        
        <img src="./public/images/factImg3.svg" alt="Fact Information 3" id="factImg3">

        <div class="learnPopUp" id="widgetCon">
            <div class="popUpBorder">
                <h3 class="pinkTitle">Take the First Step!</h3>
                <p class="smBlueText">Getting tested for HIV and other common STDs is the first step towards taking control of your overall health. Knowing your status can help keep you and the ones around you safe and healthy.</p>
                <h4 class="smBlueText">Enter your postal code below to find medical clinics offering free testing in your area.</h4>

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