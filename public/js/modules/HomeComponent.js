import WidgetComponent from './WidgetComponent.js';
export default {
    template: `
    <div id="homeCon"> 
        <h1 class="hidden"> Home Page </h1>

        <div class="imgPaddingAbt">
            <img class="animated fadeIn" src="./public/images/heroImgWeb.svg" alt="hero image with text" id="heroImage">
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
                        
                        <img class="mapicons" alt="icon" src="./public/images/doctor.svg">
                        <img class="mapicons" alt="icon" src="./public/images/condom1.svg">
                        <img class="mapicons" alt="icon" src="./public/images/needle.svg">
                        

                        <h3 class="popUpTitle">Get Tested Now!</h3>
                    


                        <p class="popUpSmall">Getting tested for HIV and other common STDs is the first step towards taking control of your overall health. Knowing your status can help keep you and the ones around you safe and healthy.</p>
                <h4 class="popUpSmall">Enter your postal code below to find medical clinics offering free testing in your area.</h4>


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