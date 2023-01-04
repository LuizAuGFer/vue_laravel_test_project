<template>
<div class="box stacked-linear">
<h1>test</h1>
</div>
</template>

<style>
.stacked-linear {
  background-color:hsla(222,0%,100%,1);
background-image:
radial-gradient(at 97% 2%, hsla(133,100%,70%,1) 0px, transparent 50%),
radial-gradient(at 0% 0%, hsla(234,100%,76%,1) 0px, transparent 50%);
}

.box {
  height: 400px;
}
</style>

<script>
export default {
    name: "Dashboard",
}
</script>