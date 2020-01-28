<template>
    <div class="container">
        <div class="main_div row m-0">
            <div class="col-lg-6 px-2 pt-5">
                <div class="leftside_img">
                    <img src="/images/preview.jpg" alt="" title="">
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
                                                    <input type="radio" class="custom-control-input" id="exampleRadios1" name="exampleRadios" value="8x8" checked v-model="radioSelect">
                                                    <label class="custom-control-label" for="exampleRadios1">8 x 11 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$100</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" v-model="radioSelect" name="exampleRadios" id="exampleRadios2" value="12x8" checked>
                                                    <label class="custom-control-label" for="exampleRadios2">12 x 8 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$59.99</del></td>
                                            <td><span>$120</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" v-model="radioSelect" name="exampleRadios" id="exampleRadios3" value="10x10" checked>
                                                    <label class="custom-control-label" for="exampleRadios3">10 x 10 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$69.99</del></td>
                                            <td><span>$130</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios4" value="16x20" checked>
                                                    <label class="custom-control-label" for="exampleRadios4">16 x 20 inches</label>
                                                </div>
                                            </td>
                                            <td class="text-right"><del>$49.99</del></td>
                                            <td><span>$150</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios5" value="20x30" checked>
                                                    <label class="custom-control-label" for="exampleRadios5">20 x 30 inches</label>
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
                                                    <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios6" value="Custom" checked>
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
                                                    </div>
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
                            
                        </div>
                        <div class="tab-pane fade" id="Landscape">
                            
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

