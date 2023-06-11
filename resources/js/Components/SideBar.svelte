<script>
    import { Link } from "@inertiajs/svelte";
    import { inertia } from "@inertiajs/svelte";
    import FaClipboardList from "svelte-icons/fa/FaClipboardList.svelte";
    import FaHome from "svelte-icons/fa/FaHome.svelte";
    import MdChevronLeft from "svelte-icons/md/MdChevronLeft.svelte";
    import MdChevronRight from "svelte-icons/md/MdChevronRight.svelte";
    import MdTrendingUp from "svelte-icons/md/MdTrendingUp.svelte";
    import NavButton from "./NavButton.svelte";

    let open = true;

    function changeSideBar() {
        open = !open;
    }
</script>

<header class="container" class:closedContainer={!open}>
    <!-- svelte-ignore a11y-click-events-have-key-events -->
    <Link href="/">
        <svg
            class="container__logo"
            width="57"
            height="48"
            viewBox="0 0 27 15"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M24.9689 3.43323L23.6105 4.22551L21.6052 4.78671L19.3735 4.39057L18.9207 5.3149L19.3735 5.64502L18.8237 5.81008L10.6408 0L8.08564 0.990354L8.53845 1.15541L5.5952 2.67396L6.24207 2.83902L3.16944 4.81973L0.193848 14.5252H4.20443L8.70017 10.6298L7.98861 11.7522L9.44407 14.4922H13.7134L12.6137 12.1814L22.6078 10.2007L26.0039 4.58864L24.9689 3.43323ZM21.3788 8.41801C20.9907 8.41801 20.6349 8.21994 20.4408 7.88982L13.3253 10.0026C13.3253 10.7619 12.7108 11.3891 11.9669 11.3891C11.223 11.3891 10.6084 10.7619 10.6084 10.0026C10.6084 9.5074 10.8672 9.04524 11.2876 8.81415L10.5437 5.18285C10.5114 5.18285 10.4791 5.18285 10.4144 5.18285C10.0262 5.18285 9.67047 5.05081 9.37938 4.81973L4.39849 11.092C4.6249 11.3561 4.75427 11.6862 4.75427 12.0163C4.75427 12.8086 4.13975 13.4688 3.33116 13.4688C2.55492 13.4688 1.90805 12.8416 1.90805 12.0163C1.90805 11.224 2.52257 10.5638 3.33116 10.5638C3.52522 10.5638 3.68694 10.5968 3.881 10.6628L8.95892 4.29154C8.7972 4.02744 8.70017 3.69732 8.70017 3.36721C8.70017 2.37685 9.47641 1.58457 10.4467 1.58457C11.417 1.58457 12.1933 2.37685 12.1933 3.36721C12.1933 4.09346 11.7728 4.68768 11.1906 4.98478L11.9345 8.61608C11.9669 8.61608 11.9669 8.61608 11.9992 8.61608C12.5167 8.61608 12.9695 8.91319 13.1959 9.34234L20.2468 7.2626C20.2468 6.63538 20.7643 6.1402 21.3788 6.1402C21.9933 6.1402 22.5108 6.66839 22.5108 7.29561C22.5108 7.92284 21.9933 8.41801 21.3788 8.41801Z"
                fill="white"
            />
            <path
                d="M2.65216 5.34766L0.840929 6.47006L0 8.31872H1.61717L2.65216 5.34766Z"
                fill="white"
            />
            <path
                d="M19.3093 11.9833C19.3093 11.8843 19.3093 11.4881 19.3093 11.3561V11.29L14.7812 12.6105L15.6545 13.6339L16.3661 14.4922H19.374L19.3093 11.9833Z"
                fill="white"
            />
        </svg>
    </Link>
    <div class="navContainer">
        <NavButton {open} text="Home">
            <FaHome />
        </NavButton>
        <NavButton {open} text="POP`s">
            <FaClipboardList />
        </NavButton>
        <div class="line" />
        <NavButton {open} text="Resultaten">
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
</header>

<style>
    .container {
        width: 12vw;
        min-width: fit-content;
        background-color: #0d403d;
        height: 100%;
        min-height: 100vh;
        position: relative;
        display: flex;
        flex-direction: column;
        align-content: center;
        padding: 1rem;
    }

    .container__logo {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 8em;
        width: 50px;
        height: 25px;
    }

    .container__logo:hover {
        cursor: pointer;
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

    button:hover {
        cursor: pointer;
    }

    .line {
        height: 2px;
        width: 100%;
        background-color: white;
        margin: 1em 0;
    }

    .closeButton {
        position: absolute;
        bottom: 5%;
        right: 0;
        background-color: transparent;
        border: none;
        color: white;
    }
</style>
