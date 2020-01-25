<template>
  <div>
      <div class="parent_div row m-0">
          <div class="col-lg-7 pt-5 pl-5">
             <img style="width:100%;height:58%" src="https://www.canvaschamp.in/skin/frontend/default/cptheme1/images/home-metal-print.jpg" alt="">
          </div>
          <div class="col-lg-5 text-center">
             <h3>Canvas</h3>
             <hr>
             <div class="col-lg-12">
                <button type="button" class="btn btn-outline-primary mr-5">Potrait</button>
                <button type="button" class="btn btn-outline-secondary mr-5">Square</button>
                <button type="button" class="btn btn-outline-success mr-5">Landscape</button>
             </div>
                <div class="text-left pt-3 ml-5">
                    <table class="table table-striped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row"></th>
                                <td>
                                    <input class="form-check-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios1" value="8x11" checked>
                                </td>
                                <td>8 x 11</td>
                                <td>$(100)</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                 <td>
                                    <input class="form-check-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios1" value="12x18" checked>
                                </td>
                                 <td>12 x 18</td>
                                <td>$(120)</td>                    
                            </tr>
                            <tr>
                            <th scope="row"></th>
                                <td>
                                    <input class="form-check-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios1" value="16x24" checked>
                                </td>
                                <td>16 x 24</td>
                                <td>$(130)</td> 
                            </tr>
                            <tr>
                            <th scope="row"></th>
                                <td>
                                    <input class="form-check-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios1" value="20x30" checked>
                                </td>
                                 <td>20 x 30</td>
                                <td>$(150)</td> 
                            </tr>
                            <tr>
                            <th scope="row"></th>
                                <td>
                                    <input class="form-check-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios1" value="24x36" checked>
                                </td>
                                 <td>24 x 36</td>
                                <td>$(200)</td> 
                            </tr>
                            <tr>
                            <th scope="row"></th>
                                <td>
                                    <input class="form-check-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios1" value="30x40" checked>
                                </td>
                                <td>30 x 40</td>
                                <td>$(220)</td> 
                            </tr>
                            <tr>
                            <th scope="row"></th>
                                <td>
                                    <input class="form-check-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios1" value="Custom" checked>
                                </td>
                                <td>Custom Size (H x W)</td>
                                <td>
                                    <div>
                                        <select v-model="selectedWidth" @change="getContext">
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                        </select>
                                        <select v-model="selectedHeight" @change="getContext">
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                        </select>
                                    </div>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <button type="button" class="btn btn-warning" @click="createCanvas">Create Canvas Print</button>
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

