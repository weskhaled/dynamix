<template>
  <div id="app">
  <el-container>
           <el-header style="height: auto;" class="fixed">
            <nav class="navbar navbar-expand-lg navbar-dark">
              <a class="navbar-brand" href="#">
                <span class="logo-text text-white"><span class="light text-white">DYNA</span>WEB</span>
              </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="ml-auto">
                <el-menu :default-active="page" :router="true" text-color="#fff" 
                         background-color="#8b46ff" active-text-color="#eee"
                         class="el-menu-demo" mode="horizontal">
                  <el-menu-item  index="/about">
                    About
                  </el-menu-item>
                  <el-menu-item  index="/">
                    Hello
                  </el-menu-item>
                  <el-submenu index="">
                    <template slot="title">Workspace</template>
                    <el-menu-item index="/">Hello</el-menu-item>
                    <el-menu-item index="/about">About</el-menu-item>
                  </el-submenu>
                </el-menu>
              </div> 
            </div>
            </nav>
        </el-header>
    <el-container>
        <el-aside width="auto">
            <!-- <el-radio-group size="small" v-model="isCollapse" style="margin-bottom: 20px;">
              <el-radio-button :label="false">expand</el-radio-button>
              <el-radio-button :label="true">collapse</el-radio-button>
            </el-radio-group> -->
            <el-menu size="small" default-active="2" class="el-menu-vertical-demo menu-collapse" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
              <el-menu-item index="4" @click="isCollapse = !isCollapse">
                <i :class="isCollapse ? 'pg-menu' : 'pg-close'"></i>
                <span slot="title">{{isCollapse ? 'Open Navigation' : 'Close Navigation' }}</span>
              </el-menu-item>
            </el-menu>
            <el-menu size="small" default-active="/" class="el-menu-vertical-demo scrolled" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
              <el-submenu size="small" index="1">
                <template slot="title">
                  <i class="el-icon-location"></i>
                  <span slot="title">Navigator One</span>
                </template>
                <el-menu-item-group>
                  <span slot="title">Group One</span>
                  <el-menu-item index="1-1">item one</el-menu-item>
                  <el-menu-item index="1-2">item two</el-menu-item>
                </el-menu-item-group>
                <el-menu-item-group title="Group Two">
                  <el-menu-item index="1-3">item three</el-menu-item>
                </el-menu-item-group>
                <el-submenu index="1-4">
                  <span slot="title">item four</span>
                  <el-menu-item index="1-4-1">item one</el-menu-item>
                </el-submenu>
              </el-submenu>
              <el-menu-item index="2">
                <i class="el-icon-menu"></i>
                <span slot="title">Navigator Two</span>
              </el-menu-item>
              <el-menu-item index="3" disabled>
                <i class="el-icon-document"></i>
                <span slot="title">Navigator Three</span>
              </el-menu-item>
            </el-menu>
      </el-aside>
      <el-main :style="[isCollapse ? {'margin-left': '64px','transition': '.25s margin-left cubic-bezier(0.4, 0, 1, 1)'} : {'margin-left': '200px','transition': '.2s margin-left cubic-bezier(0.4, 0, 1, 1)'}]">
        <div class="pl-0 pr-0 pt-2 pb-2">
          <router-view></router-view>
        </div>
      </el-main>
    </el-container>
  </el-container>
  </div>
</template>
<script>
    export default {
      name: "app",
      data: () => ({
         isCollapse: true,
         page: '',
      }),
      methods: {
        handleSelect(key, keyPath) {
          console.log(key, keyPath);
        },
        handleOpen(key, keyPath) {
          console.log(key, keyPath);
        },
        handleClose(key, keyPath) {
          console.log(key, keyPath);
        },
      },
      mounted(){
        this.page = this.$route.path;
        console.log(this.$route);
      },
    }
</script>