<script>
	import NavButton from './NavButton.svelte';
    import FaHome from 'svelte-icons/fa/FaHome.svelte';
    import FaClipboardList from 'svelte-icons/fa/FaClipboardList.svelte';
    import MdTrendingUp from 'svelte-icons/md/MdTrendingUp.svelte';
    import MdChevronLeft from 'svelte-icons/md/MdChevronLeft.svelte'
    import MdChevronRight from 'svelte-icons/md/MdChevronRight.svelte'

    let open = true;

    function changeSideBar() {
        open = !open;
    }
</script>

<style>
    .container {
        width: 12vw;
        min-width: fit-content;
        padding: 1em;
        background-color: #0D403D;
        height: 100%;
        position: fixed;
        display: flex;
        flex-direction: column;
        align-content: center;
    }

    .closedContainer {
        width: 2vw;
    }

    .iconHolder {
        width: 2em;
        height: 2em;
    }

    .navContainer {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 3em;
        min-width: 8em;
    }
    
    button:hover{
        cursor: pointer;
    }

    .line{
        height: 2px;
        width: 100%;
        background-color: white;
        margin: 1em 0;
    }

    .closeButton{
        position: absolute;
        bottom: 5vh;
        right: 0;
        background-color: transparent;
        border: none;
        color: white;
    }
</style>

<div    
    class="container"
    class:closedContainer={!open}
>
    <img alt="logo" src="" />
    <div class="navContainer">
        <NavButton 
            open={open}
            text="Home"
        >
            <FaHome />
        </NavButton>
        <NavButton 
            open={open}
            text="POP`s"
        >
            <FaClipboardList />
        </NavButton>
        <div class='line'></div>
        <NavButton 
            open={open}
            text="Resultaten"
        >
            <MdTrendingUp />
        </NavButton>
    </div>

    <button class="closeButton" on:click={changeSideBar}>
        <div class="iconHolder">
            {#if open}
                <MdChevronLeft />
            {:else}
                <MdChevronRight />
            {/if}
        </div>
    </button>
</div>
