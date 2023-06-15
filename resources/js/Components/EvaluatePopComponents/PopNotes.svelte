<script lang="ts">
    import { useForm } from "@inertiajs/svelte";
    import moment from "moment";
    import { MdSave } from "svelte-icons/md";
    import { currentPopNotes } from "./../../stores.js";
    import IconHolder from "./../IconHolder.svelte";
    import PopNote from "./PopNote.svelte";

    let text: string = "";
    let form = useForm({
        date: "",
        time: "",
        note: "",
    });

    // TODO LocalStorage voor notes uitwerken

    export let notes = [
        {
            date: moment("01 01 1980"),
            time: moment().hours(4).minutes(3).format("HH:mm"),
            note: "Karin heeft de doelen niet behaald uit POP-2. ",
        },
        {
            date: moment("01 01 1980"),
            time: moment().hours(4).minutes(3).format("HH:mm"),
            note: "Another note, another day.",
        },
    ];

    currentPopNotes.subscribe((value) => {
        console.log(value);
    });
    currentPopNotes.subscribe((value) => {
        console.log(value);
    });
    $: newNote = {
        date: moment().format("LL"),
        time: moment().format("HH:mm"),
        note: $form.note,
    };
    const handleSave = () => {
        notes.push(newNote);
        notes = notes;
        $form.note;
    };
</script>

<h2 class="notes__header">Interne notities</h2>
<section class="notes">
    <section class="notes__list">
        {#each notes as note}
            <div class="note">
                <PopNote
                    date={moment(note.date).format("L")}
                    time={note.time}
                    note={note.note}
                />
            </div>
        {/each}
    </section>
    <form class="notes__form" on:submit|preventDefault={() => handleSave()}>
        <input id="note" name="note" type="text" bind:value={$form.note} />
        <button type="submit" on:click={() => handleSave()}>
            <IconHolder>
                <MdSave />
            </IconHolder>
        </button>
    </form>
</section>

<style>
    .notes {
        display: flex;
        flex-direction: column;
        background-color: #fff;
        height: 100%;
        width: 100%;
        max-width: 100%;
        font-family: "Montserrat", sans-serif;
        border-radius: 1.5rem;
    }

    .notes__list {
        height: 90%;
        max-height: 90%;
        max-height: 30rem;
        min-width: 100%;
        width: 100%;
        overflow: scroll;
        color: black;
    }

    .notes__header {
        font-size: 1.8rem;
    }

    .notes__form {
        display: flex;
        flex-flow: row;
        gap: 0.5rem;
        justify-content: center;
        align-items: start;
        margin: 0 auto;
        width: 100%;
        margin-top: auto;
        margin-bottom: 1rem;
    }

    .notes__form > input {
        font-family: "Montserrat", sans-serif;
        padding: 1rem;
        height: 4rem;
        width: 80%;
        box-shadow: 0 0 0 1px solid black;
        gap: 1rem;

        border-style: 0 0 0 1px solid none none black;
    }

    .notes__form > button {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;

        border: 1px none none solid black;
        height: 4rem;
        width: 4rem;
        /* min-height: 100%; */
        width: 10%;
        border-radius: 0.5rem;
    }

    button:hover {
        cursor: pointer;
    }

    button:active {
        filter: brightness(0.8);
        transition: 0.3s filter ease-out;
    }
</style>
