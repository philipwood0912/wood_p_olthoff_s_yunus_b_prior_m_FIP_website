import MapComponent from './MapComponent.js';
export default {
    template: `
    <div class="widgetCon">
        <h2 class="postal-msg">{{postalMessage}}</h2>
        <div class="postal-wrp">
            <form @submit.prevent="pullLocation(postal)">
                <label class="hidden">Postal Code:</label>
                <input v-model="postal" maxlength="6" name="postal" placeholder="Enter Your Postal Code">
                <button class="arrow-btn" name="submit">Go!</button>
            </form>
        </div>
        <mapcomp></mapcomp>
    </div>
    `,
    components: {
        mapcomp: MapComponent
    },
    data: function(){
        return {
            postal: "",
            closeClinics: [],
            curLat: 42.984909,
            curLng: -81.245302,
            postalMessage: ""
        }
    },
    methods: {
        degToRad(deg){
            return deg * Math.PI / 180; // return deg multiplied by PI divided by 180 - radian convert
        },
        haversineForm(coords1, coords2){
            var lat1 = coords1[0], // first set lat / lon variables from coords
                lon1 = coords1[1],
                lat2 = coords2[0],
                lon2 = coords2[1],
                dlat = lat1 - lat2, // calculate the difference between the lats and lons
                dlon = lon1 - lon2,
                dlatRad = this.degToRad(dlat), // convert lat / lon differences into radians
                dlonRad = this.degToRad(dlon),
                lat1Rad = this.degToRad(lat1), // convert lat1 / lat2 in radians
                lat2Rad = this.degToRad(lat2),
                radius = 6371; // appox estimate of earths radius

                //formula - full explainion @ https://github.com/philipwood0912/haversine_test
                return radius * 2 * Math.asin(
                    Math.sqrt(
                        Math.pow(Math.sin(dlatRad/2), 2) +
                        Math.cos(lat1Rad) * Math.cos(lat2Rad) *
                        Math.pow(Math.sin(dlonRad/2), 2)
                    )
                )
        },
        pullLocation(input){
            this.closeClinics = []; //reset closeClinics array
            let regexTest = this.postalCodeCheck(input); // run regex to make sure postal code is inputed
            if(regexTest){
                let url = `https://geocoder.ca/?postal=${input}&geoit=XML&json=1`;
                fetch(url)
                .then(res => res.json())
                .then(data => {
                    this.curLat = parseFloat(data.latt); // set current lat / lng - must be parsed before being passed to api
                    this.curLng = parseFloat(data.longt);
                    for(var i=0;i<this.$root.clinics.length;i++){
                        let distance = this.haversineForm([data.latt, data.longt], [this.$root.clinics[i].Latt, this.$root.clinics[i].Longt]);
                        this.$root.clinics[i].Distance = distance.toFixed(3); // convert distance to 3 decimal points - example: 4.555 = 4kilometres 555metres
                        let metres = distance.toFixed(3);
                        let metresSplit =  metres.split('.');
                        this.$root.clinics[i].Metres = metresSplit[1];
                        if(this.$root.clinics[i].Distance <= 20.0){
                            this.closeClinics.push(this.$root.clinics[i]); // if distance is < 20km push to closeClinics array 
                        }else{
                            continue; // else continue the loop
                        }
                    }
                    for(var i=0;i<this.closeClinics.length;i++){
                        this.closeClinics[i].Latt = parseFloat(this.closeClinics[i].Latt); // convert closeClinic lat / lng values for use later
                        this.closeClinics[i].Longt = parseFloat(this.closeClinics[i].Longt);
                        this.closeClinics[i].Actual_Distance = ""; // set actual distance property which will be displayed
                        let roundedKm = Math.round(this.closeClinics[i].Distance * 10) / 10;
                        if(this.closeClinics[i].Distance < 1.000){
                            this.closeClinics[i].Actual_Distance = "" + this.closeClinics[i].Metres + " Metres"; // if distance to clinic is < 1km away, set distance in metres
                        } else if(this.closeClinics[i].Distance > 1.000 && this.closeClinics[i].Distance < 1.050) {
                            this.closeClinics[i].Actual_Distance = "" + roundedKm + " Kilometre" //
                        } else {
                            this.closeClinics[i].Actual_Distance = "" + roundedKm + " Kilometres" 
                        }
                    }
                    this.postalMessage = "";
                    console.log(this.closeClinics);
                    console.log(this.curLat);
                    console.log(this.curLng);
                })
                .catch(err => console.log(err))
            } else {
                this.postalMessage = "Not a valid postal code.."; // if regex fails return message
            }
        },
        postalCodeCheck(input){
            let regex = new RegExp(/^[a-z]\d[a-z]\d[a-z]\d/, 'i'); // reg expression to match to postal code
            let match = regex.test(input);
            if (match === true){
                return true;
            } else {
                return false;
            }
        }

    }
}