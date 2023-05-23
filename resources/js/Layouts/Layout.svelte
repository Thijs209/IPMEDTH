<script>
    import SideBar from "./../Components/SideBar.svelte";
    // centeredContent is a prop used by a slot parent to indicate the main content should be centered.
    export let centeredContent = false; 
</script>

<!-- Inertia places the markup below in Svelte's root file (App.html), specifically into the <Body> -->
<div class="layout-wrapper">
    <SideBar />
    <main class="main" class:center-content="{centeredContent === true}">
        <slot name="main" class="slot" />
    </main>
</div>

<style>
    /* FIXME Interim fix for width issue */
    .layout-wrapper {
        display: flex;
        flex-direction: row;
        justify-content: start;
        align-items: start;
        max-width: 100%;
        /* min-height: 100vh; */
        height: 100%;
    }
    .main {
        height: 100%;
        min-height: 100vh;
        width: 100%;
        max-width: 100%;
        background-color: #eee; /*TODO remove test bg in production*/
    }

    .center-content {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
