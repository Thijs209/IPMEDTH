<script lang="ts">
    let text: string;
    let open: boolean;

    console.log(open);
    console.log(text);
</script>

<style>
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

    .iconHolder {
        width: 2em;
        height: 2em;
    }
</style>

<div>
    <button class="navRow">
        <div class="iconHolder">
            <slot></slot>
        </div>
        {#if open}
        <p>{text}</p>
        {/if}
    </button>
</div>