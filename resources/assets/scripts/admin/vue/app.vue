<template>
  <div id="app">
    <el-container>
        <el-header style="height: auto;">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">DYNAMIX</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="ml-auto">
                <el-menu
                        :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
                  <el-menu-item index="1">Processing Center</el-menu-item>
                  <el-submenu index="2">
                    <template slot="title">Workspace</template>
                    <el-menu-item index="2-1">
                      <router-link to="/About" tag="span">item one</router-link>
                    </el-menu-item>
                    <el-menu-item index="2-2">
                      <router-link to="/" tag="span">item two</router-link>
                    </el-menu-item>
                    <el-menu-item index="2-3">item three</el-menu-item>
                  </el-submenu>
                </el-menu>
              </div> 
            </div>
            </nav>
        </el-header>
        <el-main>
          <router-view></router-view>
        </el-main>
    </el-container>
  </div>
</template>
<script>
    export default {
      name: "app",
      data: () => ({
          activeIndex:'1',
      }),
      methods: {
        handleSelect(key, keyPath) {
          console.log(key, keyPath);
        },
      },
    }
</script>