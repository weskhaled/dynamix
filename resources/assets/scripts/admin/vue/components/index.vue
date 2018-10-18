<template>
<div class="container-fluid">
  <el-row>
      <el-col :span="24">
          <h1 class="test">Admin Pages</h1>
          <div class="block">
              <span class="demonstration">Start date time 12:00:00, end date time 08:00:00</span>
              <el-date-picker v-model="value7" size="small"
                              type="datetimerange"
                              align="right"
                              start-placeholder="Start Date"
                              end-placeholder="End Date"
                              :default-time="['12:00:00', '08:00:00']">
              </el-date-picker>
          </div>
          <el-button @click="visible = true" size="small">Open Dialog</el-button>
      </el-col>
  </el-row>
  <!-- dialog -->
  <el-dialog :visible.sync="visible" title="Hello world">
      <el-row>
        <el-carousel :interval="4000" type="card" height="250px">
            <el-carousel-item v-for="item in sliders" :key="item.id">
                <div class="slider-post text-center" :style="{'background':'url('+item.photo+')'}">
                    <h3 v-html="item.name"></h3>
                </div>
            </el-carousel-item>
        </el-carousel>
      </el-row>
  </el-dialog>
</div>    
</template>
<script>
import axios from 'axios';
    export default {
      name: "Index",
      data: () => ({
          visible:false,
          value7:'',
          // reactive data property of the component.
          sliders: [],
      }),
      methods: {
          getsliders(){
            return axios.get(wpApiSettings.root+'wp/v2/slider',{},{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
          },
          getmediabyid(id){
            return axios.post(wpApiSettings.root+'wp/v2/media/'+id,{},{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
          },
      },
      mounted: function() {
        let self = this;
        this.getsliders().then((response) => {
            response.data.forEach(function (item,key) {
                self.sliders[key] = {};
                self.sliders[key].name = item.slug;
                self.sliders[key].photo = item.featured_image_src;
            });
        })
        .catch((e) => {
            console.error(e)
        });

        // axios.get(wpApiSettings.root+'wp/v2/media',{},{headers: { 'X-WP-Nonce': wpApiSettings.nonce }}).then((response) => {
        //     console.log(response.data);
        // })
        // .catch((e) => {
        //     console.error(e)
        // })
        // axios.get(wpApiSettings.root+'wp/v2/slider',{},{headers: { 'X-WP-Nonce': wpApiSettings.nonce }}).then((response) => {
        //     console.log(response.data);
        // })
        // .catch((e) => {
        //     console.error(e)
        // })

        // var params = new URLSearchParams();
        // params.append('action', 'get_modal');
        // axios.post(ajax_object.ajax_url,params).then((response) => {
        // this.sliders = response.data;
        // // console.log(response.data[0].post_content);
        // })
        // .catch((e) => {
        // console.error(e)
        // })
      },
    }
</script>