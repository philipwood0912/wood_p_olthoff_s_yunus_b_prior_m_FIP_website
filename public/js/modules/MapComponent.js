export default {
    template: `
    <div id="map">
        <gmap-map
            :center="{lat:this.$parent.curLat, lng:this.$parent.curLng}"
            :zoom="11"
            :clickable="true"
            @click="windowClose()"
            map-type-id="terrain"
            style="width: 100%; height: 100%;"
        >
            <gmap-marker 
                :position="{lat:this.$parent.curLat, lng:this.$parent.curLng}" 
                icon="http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
            />
            <gmap-marker
                :key="index"
                v-for="(c, index) in this.$parent.closeClinics"
                :position="{lat:c.Latt, lng:c.Longt}"
                :clickable="true"
                @click="clinicClick(c, index)"
            />
        </gmap-map>
        <div @click="windowClose()" id="info-wrp" v-if="windowOpen">
            <div id="infowindow">
                <h2>{{windowInfoTitle}}</h2>
                <h3>Address: {{windowInfoAddress}}</h3>
                <h3>Phone: {{windowInfoPhone}}</h3>
                <h4>Distance: {{windowInfoDistance}}</h4>
                <h4>Website:  <a target="_blank" :href="windowInfoWebsite">Click Here</a></h4>
            </div>
        </div>
    </div>
    `,
    data: function(){
        return {
            windowInfoTitle: "",
            windowInfoAddress: "",
            windowInfoPhone: "",
            windowInfoWebsite: "",
            windowInfoDistance: "",
            windowOpen: false,
            windowIndex: null
        }
    },
    methods: {
        clinicClick(c, index){
            this.windowInfoTitle = c.Clinic_Name; // popup window content
            this.windowInfoAddress = c.Address;
            this.windowInfoPhone = c.Phone;
            this.windowInfoWebsite = c.Website;
            this.windowInfoDistance = c.Actual_Distance;
            if(this.windowIndex == index){
                this.windowOpen = !this.windowOpen // toggle the popup window if index match
            } else {
                this.windowOpen = true; // if not open window anyways and set windowIndex as marker index
                this.windowIndex = index;
            }
        },
        windowClose(){
            this.windowOpen = false;
        }
    }
}