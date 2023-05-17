<script>
    import FaHome from 'svelte-icons/fa/FaHome.svelte';
    import FaClipboardList from 'svelte-icons/fa/FaClipboardList.svelte';
    import MdTrendingUp from 'svelte-icons/md/MdTrendingUp.svelte';
    import MdChevronLeft from 'svelte-icons/md/MdChevronLeft.svelte'
    import MdChevronRight from 'svelte-icons/md/MdChevronRight.svelte'

    let open = true;

    function changeSideBar() {
        console.log(open);
        open = !open;
        console.log(open);
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
    
    button{
        border-radius: 1em;
        width: 100%;
        background-color: transparent;
        border: none;
        color: white;
    }

    .navRow{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: left;
        gap: .5em;
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

    .close{
        position: absolute;
        bottom: 5vh;
        right: 0;
        background-color: transparent;
        border: none;
        color: white;
    }
</style>

<div class="container">
    <img alt="placeholder" src="" />
    <div class="navContainer">
        <button class="navRow">
            <div class="iconHolder">
                <FaHome />
            </div>
            <p>Home</p>
        </button>
        <button class="navRow">
            <div class="iconHolder">
                <FaClipboardList />
            </div>
            <p>POP`s`</p>
        </button>
        <div class='line'></div>
        <button class="navRow">
            <div class=iconHolder>
                <MdTrendingUp />
            </div>
            <p>Evaluatie</p>
        </button>
    </div>

    <button class="close" on:click={changeSideBar()}>
        <div class="iconHolder">
            {#if open}
                <MdChevronLeft />
            {:else}
                <MdChevronRight />
            {/if}
        </div>
    </button>
</div>
