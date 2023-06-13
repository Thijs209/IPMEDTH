<script>
    import Button from "../Button.svelte";
    import FaAngleRight from 'svelte-icons/fa/FaAngleRight.svelte'

    export let title;
</script>

<div class="goalContainer">
    <h3>
        {title}
    </h3>
    <Button icon>
        <FaAngleRight />
    </Button>
</div>

<style>
    .goalContainer{
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1em 0;
        background-color: #0d403d;
        color: white;
        border-radius: 1.5em;
        padding: 1em 2em;
        margin-top: 1em;
    }
</style>