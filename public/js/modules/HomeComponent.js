import WidgetComponent from './WidgetComponent.js';
export default {
    template: `
    <div id="homeCon"> 
        <h1 class="hidden"> Home Page </h1>

        <div class="imgPaddingAbt">
            <img src="./public/images/heroImgWeb.svg" alt="hero image with text" id="heroImage">
        </div>

        <div id="homeBottom">

                <div v-for="(content, index) in this.$parent.homeContent" :key="index">
                    <div class="popUp" :id="content.id">
                        <div class="blueBorder">
                            <div class="iconCon">
                                <img class="icons" alt="icon" :src="'./public/images/' + content.image">
                                <h3 class="popUpTitle">{{content.title}}</h3>
                            </div>
                            <p class="popUpSmall">{{content.text}}</p>
                        </div>
                    </div>
                </div>
            

            <div class="videoCon">
                <div class="blueBorder">
                    <video  class="promoVideo" controls poster="./public/images/vid_poster.jpg">
                        <source src="./public/video/promo_video_2020.mp4" type="video/mp4">
                        <source src="./public/video/promo_video_2020.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            <div class="videoCon mapContainer">
                <div class="blueBorder mapBorder">
                    <div class="iconMap">
                        <img class="mapicons" alt="icon" src="./public/images/condom1.svg">
                        <img class="mapicons" alt="icon" src="./public/images/needle.svg">
                        <img class="mapicons" alt="icon" src="./public/images/doctor2.svg">

                        <h3 class="popUpTitle">Get Tested Now!</h3>
                    

                        <p class="popUpSmall">Enter your postal code below to find the clinic closest you.</p>

                        <widget></widget>
                    </div>
                </div>
            </div>
        </div>
    </div>
`,
    components: {
        widget: WidgetComponent
    },
}