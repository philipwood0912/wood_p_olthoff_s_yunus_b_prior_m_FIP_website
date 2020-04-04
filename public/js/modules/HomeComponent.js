import WidgetComponent from './WidgetComponent.js';
export default {
    template: `
    <div id="homeCon"> 
        <h1 class="hidden"> Home Page </h1>

        <div id="heroCon"> 
            <img src="./public/images/heroImgWeb.svg" alt="hero image with text" id="heroImage">

            <i class="fas fa-chevron-down fa-3x" id="chevronDown"> </i>
        </div>

        <div id="homeBottom">

            <div v-for="(content, index) in this.$parent.homeContent" :key="index">
                <div class="popUp" :id="content.id">
                    <div class="blueBorder">
                        <div class="iconCon">
                            <img class="icons" alt="icon" :src="'./public/images/' + content.image">
                            <h3 class="pinkTitle">{{content.title}}</h3>
                        </div>
                        <p class="smBlueText">{{content.text}}</p>
                    </div>
                </div>
            </div>

            <button class="button"> <span class="buttonTxt"> Get The Facts </span></button>

        </div>

        <div id="videoCon">
            <video  id="promoVideo" controls>
                <source src="./public/video/promo_video_2020.mp4" type="video/mp4">
                <source src="./public/video/promo_video_2020.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="popUpMap">
            <div class="blueBorder">
                <div class="iconCon iconMap">
                    <img class="icons" alt="icon" src="./public/images/condom1.svg">
                    <h3 class="pinkTitle">Get Tested Now!</h3>
                </div>
                <p class="smBlueText">Find a clinic near you.</p>
                <widget></widget>
            </div>
            </div>
    </div>
`,
    components: {
        widget: WidgetComponent
    },
}