<template>
    <div class="container">
        <div class="main_div row m-0">
            <div class="col-lg-6 px-2 pt-5">
                <div class="leftside_img">
                    <img src="/images/post1.jpg" alt="" title="">
                </div>
            </div>
            <div class="col-lg-6 text-center px-5 right_div">
                <h2>Canvas</h2>
                <hr>
                <div class="col-lg-12 p-0">
                    <ul class="nav nav-pills justify-content-center pt-2">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#Potrait">Potrait</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#Square">Square</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#Landscape">Landscape</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="Potrait">
                            <div class="text-left pt-4">
                                <table class="table table-striped table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="exampleRadios1" name="exampleRadios" value="11x8" checked v-model="radioSelect">
                                                    <label class="custom-control-label" for="exampleRadios1">8 x 11 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$100</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" v-model="radioSelect" name="exampleRadios" id="exampleRadios3" value="11x14" checked>
                                                    <label class="custom-control-label" for="exampleRadios3">14 x 11 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$69.99</del></td>
                                            <td><span>$130</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios4" value="12x16" checked>
                                                    <label class="custom-control-label" for="exampleRadios4">16 x 12 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$150</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios5" value="24x36" checked>
                                                    <label class="custom-control-label" for="exampleRadios5">36 x 24 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$200</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios6" value="30x40" checked>
                                                    <label class="custom-control-label" for="exampleRadios6">40 x 30 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$200</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios7" value="36x48" checked>
                                                    <label class="custom-control-label" for="exampleRadios7">48 x 36 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$200</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios8" value="40x52" checked>
                                                    <label class="custom-control-label" for="exampleRadios8">52 x 40 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$200</span></td>
                                        </tr>
                                        <!-- <tr>
                                            <td>
                                                <input class="form-check-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios1" value="30x30" checked>
                                            </td>
                                            <td>30 x 40</td>
                                            <td>$(220)</td> 
                                        </tr> -->
                                        <tr>
                                            <td colspan="3">
                                                <div class="custom-control custom-radio">
                                                    <!-- <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios6" value="Custom" checked>
                                                    <label class="custom-control-label" for="exampleRadios6">Custom Size (H x W)</label>
                                                    <div class="col-lg-7 p-0 float-right">
                                                        <div class="row">
                                                            <div class="col-lg-5 pr-0">
                                                                <select v-model="selectedWidth" @change="getContext" class="form-control">
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-1 p-0"></div>
                                                            <div class="col-lg-5 pl-0">
                                                                <select v-model="selectedHeight" @change="getContext" class="form-control">
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-lg-12 custome_price">
                                                        <h2>
                                                            <del>$249.99</del>
                                                            <span>$219.99</span>
                                                            <span class="offer_label"> 55% OFF </span>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button type="button" class="btn canvas_btn" @click="createCanvas">Create Canvas Print</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Square">
                            <div class="text-left pt-4">
                                <table class="table table-striped table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="squareradio1" name="squareRadio" value="12x12" checked v-model="radioSelect">
                                                    <label class="custom-control-label" for="squareradio1">12 x 12 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$100</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" v-model="radioSelect" name="squareRadio" id="squareradio2" value="16x16" checked>
                                                    <label class="custom-control-label" for="squareradio2">16 x 16 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$59.99</del></td>
                                            <td><span>$120</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" v-model="radioSelect" name="squareRadio" id="squareradio3" value="20x20" checked>
                                                    <label class="custom-control-label" for="squareradio3">20 x 20 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$69.99</del></td>
                                            <td><span>$130</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="squareRadio" id="squareradio4" value="24x24" checked>
                                                    <label class="custom-control-label" for="squareradio4">24 x 24 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$150</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="squareRadio" id="squareradio5" value="28x28" checked>
                                                    <label class="custom-control-label" for="squareradio5">28 x 28 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$200</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="squareRadio" id="squareradio6" value="32x32" checked>
                                                    <label class="custom-control-label" for="squareradio6">32 x 32 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$200</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="squareRadio" id="squareradio7" value="36x36" checked>
                                                    <label class="custom-control-label" for="squareradio7">36 x 36 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$200</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="custom-control custom-radio">
                                                    <div class="col-lg-12 custome_price">
                                                        <h2>
                                                            <del>$249.99</del>
                                                            <span>$219.99</span>
                                                            <span class="offer_label"> 55% OFF</span>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button type="button" class="btn canvas_btn" @click="createCanvas">Create Canvas Print</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Landscape">
                            <div class="text-left pt-4">
                                <table class="table table-striped table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="landscape1" name="LandscapeRadios" value="24x10" checked v-model="radioSelect">
                                                    <label class="custom-control-label" for="landscape1">10 x 24 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$100</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" v-model="radioSelect" name="LandscapeRadios" id="landscape2" value="36x12" checked>
                                                    <label class="custom-control-label" for="landscape2">12 x 36 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$59.99</del></td>
                                            <td><span>$120</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" v-model="radioSelect" name="LandscapeRadios" id="landscape3" value="52x16" checked>
                                                    <label class="custom-control-label" for="landscape3">16 x 52 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$69.99</del></td>
                                            <td><span>$130</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="LandscapeRadios" id="landscape4" value="48x18" checked>
                                                    <label class="custom-control-label" for="landscape4">18 x 48 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$150</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="LandscapeRadios" id="landscape5" value="34x22" checked>
                                                    <label class="custom-control-label" for="landscape5">22 x 34 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$200</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="LandscapeRadios" id="landscape6" value="51x33" checked>
                                                    <label class="custom-control-label" for="landscape6">33 x 51 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$200</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="custom-control custom-radio">
                                                    <div class="col-lg-12 custome_price">
                                                        <h2>
                                                            <del>$249.99</del>
                                                            <span>$219.99</span>
                                                            <span class="offer_label"> 55% OFF </span>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button type="button" class="btn canvas_btn" @click="createCanvas">Create Canvas Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {
    mapState,
    mapActions,
    mapGetters,
    mapMutations
} from 'vuex';
export default {
   data(){
       return {
           selectedWidth:'380',
           selectedHeight:'380',
           radioSelect: '8 x 11'
       }
   },
   computed: {
        ...mapState([ 
            'widthHeightSelect',
            'customHeight',
            'customWidth'
        ])
    },
   methods:{
        ...mapActions([
            'ACTION_CHANGE_STATE',
        ]),
       getContext(){
        //    console.log(this.selectedWidth)
       },
       createCanvas(){
           if(this.radioSelect != 'Custom'){
                this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.radioSelect ])
                this.$router.push('/dev-ui')
           }else{
               this.ACTION_CHANGE_STATE(['customHeight' , this.selectedHeight ])
               this.ACTION_CHANGE_STATE(['customWidth' , this.selectedWidth ])
               this.$router.push('/dev-ui')
           }
       }
   }
}
</script>

