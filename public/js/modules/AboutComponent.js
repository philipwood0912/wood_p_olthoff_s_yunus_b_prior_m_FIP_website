export default {
    template: `
<div id="aboutCon">
    <h1 class="hidden">About Our Campaign</h1>

    <div class="abtVideoCon">
                <div class="blueBorder">
                    <video  class="promoVideo" controls>
                        <source src="./public/video/promo_video_2020.mp4" type="video/mp4">
                        <source src="./public/video/promo_video_2020.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        
        <img id="aboutLogo" src="public/images/gettested_logo.svg" alt="logo">
    
    <div class="imgPaddingAbt">
        <img src="./public/images/aboutHero-06.svg" alt="hero image with text" id="aboutHero">
    </div>
    <div class="imgPaddingAbt">
        <img src="./public/images/hiv-aids.svg" alt="Hiv&Aids" id="hivAndAids">
    </div>
    

    <div class="aboutPop" v-for="(content, index) in this.$parent.aboutContent" :key="index">
        <div class="blueBorder">
            <h3 class="popUpTitle">{{content.title}}</h3>
            <ul>
                <li class="popUpList" v-for="info in content.text">{{info}}</li>
            </ul>
        </div>
    </div>
</div> 
`}