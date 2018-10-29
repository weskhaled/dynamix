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
  <el-row>
    <el-col :span="12">
      <div class="card text-dark bg-light mb-3 p-0" style="max-width:100%">
        <div class="card-header">Header</div>
        <div class="card-body p-1">
          <apexcharts id="vuechart-example" height="400px" width="100%" type="area" :options="chartOptions" :series="series"></apexcharts>
        </div>
      </div>
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
import VueApexCharts from 'vue-apexcharts';
    export default {
      name: "Index",
      components: {
        apexcharts: VueApexCharts,
      },
      data: () => ({
          visible:false,
          value7:'',
          // reactive data property of the component.
          sliders: [],
          chartOptions: {
            chart: {
              id: 'vuechart-example',
              width: '100%',
            },
            xaxis: {
                type: 'datetime',
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
          },
          series: [{
                name: 'north',
                data: [{
                        x: 1996,
                        y: 322,
                    },
                    {
                        x: 1997,
                        y: 324,
                    },
                    {
                        x: 1998,
                        y: 329,
                    },
                    {
                        x: 1999,
                        y: 342,
                    },
                    {
                        x: 2000,
                        y: 348,
                    },
                    {
                        x: 2001,
                        y: 334,
                    },
                    {
                        x: 2002,
                        y: 325,
                    },
                    {
                        x: 2003,
                        y: 316,
                    },
                    {
                        x: 2004,
                        y: 318,
                    },
                    {
                        x: 2005,
                        y: 330,
                    },
                    {
                        x: 2006,
                        y: 355,
                    },
                    {
                        x: 2007,
                        y: 366,
                    },
                    {
                        x: 2008,
                        y: 337,
                    },
                    {
                        x: 2009,
                        y: 352,
                    },
                    {
                        x: 2010,
                        y: 377,
                    },
                    {
                        x: 2011,
                        y: 383,
                    },
                    {
                        x: 2012,
                        y: 344,
                    },
                    {
                        x: 2013,
                        y: 366,
                    },
                    {
                        x: 2014,
                        y: 389,
                    },
                    {
                        x: 2015,
                        y: 334,
                    },
                ],
            }, {
                name: 'south',
                data: [

                    {
                        x: 1996,
                        y: 162,
                    },
                    {
                        x: 1997,
                        y: 90,
                    },
                    {
                        x: 1998,
                        y: 50,
                    },
                    {
                        x: 1999,
                        y: 77,
                    },
                    {
                        x: 2000,
                        y: 35,
                    },
                    {
                        x: 2001,
                        y: -45,
                    },
                    {
                        x: 2002,
                        y: -88,
                    },
                    {
                        x: 2003,
                        y: -120,
                    },
                    {
                        x: 2004,
                        y: -156,
                    },
                    {
                        x: 2005,
                        y: -123,
                    },
                    {
                        x: 2006,
                        y: -88,
                    },
                    {
                        x: 2007,
                        y: -66,
                    },
                    {
                        x: 2008,
                        y: -45,
                    },
                    {
                        x: 2009,
                        y: -29,
                    },
                    {
                        x: 2010,
                        y: -45,
                    },
                    {
                        x: 2011,
                        y: -88,
                    },
                    {
                        x: 2012,
                        y: -132,
                    },
                    {
                        x: 2013,
                        y: -146,
                    },
                    {
                        x: 2014,
                        y: -169,
                    },
                    {
                        x: 2015,
                        y: -184,
                    },
                ],
            }],
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
        // console.log(this.$apexcharts.exec('vuechart-example',{},true));
        // this.$apexcharts.exec('vuechart-example', 'redrawPaths');
        setTimeout(function () { 
           self.$apexcharts.exec('vuechart-example', 'render')
          } , 5000);
        this.$nextTick(function () {
          // self.$apexcharts.exec('vuechart-example', 'updateSeries')
        })
        
        // this.$apexcharts.render();
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