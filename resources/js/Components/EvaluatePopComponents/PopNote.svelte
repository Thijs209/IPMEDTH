<script lang="ts">
    export let date: string;
    export let time: string;
    export let note: string;
</script>

<section class="container">
    <div class="date">
        <p class="date__time">
            {time + " uur"}
        </p>
        <p class="date__date">
            {date}
        </p>
    </div>
    <div class="note">
        <p>{note}</p>
    </div>
</section>

<style>
    .container {
        display: flex;
        flex-flow: row nowrap;
        justify-content: space-between;
        align-items: center;
        font-family: "Montserrat", sans-serif;
        width: 90%;
        margin: 0 auto;
        min-height: 10rem;
        padding: 2rem;
        gap: 1rem;
        border-bottom: #ddd 0.4rem solid;
        align-self: start;
    }
    .date {
        display: flex;
        flex-flow: column;
        justify-content: start;
        align-items: end;
        width: 30%;
        height: 100%;

        text-align: right;
    }

    .date__time {
        font-weight: 600;
        color: #222;
        font-size: 1.4rem;
    }

    .date__date {
        font-style: italic;
        color: #222;
        font-size: 1.3rem;
    }

    .note {
        display: flex;
        flex-direction: row;

        width: 70%;
        height: 100%;
        color: black;
        font-size: 1.3rem;
    }
</style>
