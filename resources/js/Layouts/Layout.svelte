<script>
    import SideBar from "./../Components/SideBar.svelte";
    import { inertia } from "@inertiajs/svelte";
</script>

<!-- Inertia places the markup below in Svelte's root file (App.html), specifically into the <Body> -->
<div class="layout-wrapper">
    <SideBar />
    <main class="page">
        <slot name="main" />
    </main>
</div>

<style>
    /* FIXME Interim fix for width issue */
    .layout-wrapper {
        display: flex;
        flex-direction: row;
        max-width: 100%;
        min-height: 100vh;
        height: 100%;
    }
    .page {
        height: 100%;
        min-height: 100vh;
        width: 100%;
        max-width: 100%;
        background-color: #eee;
        display: flex;

        justify-content: center;
        align-items: center;
    }
</style>
