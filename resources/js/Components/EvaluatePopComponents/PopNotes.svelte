<script lang="ts">
    import { writable } from "svelte/store";
    import { currentPopNotes } from "./../../stores.js";
    import { useForm, router, page } from "@inertiajs/svelte";
    import { MdSave } from "svelte-icons/md";
    import moment from "moment";
    import "moment/locale/nl";
    import IconHolder from "./../IconHolder.svelte";
    import PopNote from "./PopNote.svelte";
    import CoreQuadrant from "./CoreQuadrant.svelte";

    type Note = {
        date: string;
        time: string;
        note: string;
    };
    // TODO LocalStorage voor notes uitwerken
    
    export let notes: Note[] = [
        {
            date: moment("11-06-2023", "DD-MM-YYYY").format(),
            time: moment(2000).format("HH:mm"),
            note: "Karin lijkt niet  ",
        },
        {
            date: moment("22-01-2022", "DD-MM-YYYY").format(),
            time: moment(2011).format("HH:mm"),
            note: "",
        },
    ];
    console.log(notes);

    let form = useForm({
        date: moment().format("DD-MM-YYYY"),
        time: moment().format("HH:mm"),
        note: "",
    });

    currentPopNotes.subscribe((value) => {
        console.log(value);
    });
    let newNote: Note = {
        date: $form.date,
        time: $form.time,
        note: $form.note,
    };
    const handleSave = () => {
        notes.push(newNote);
    };

    $: $form,
        () => {
            $form.note, $form.date, $form.time;
        };
</script>

<h2 class="notes__header">Interne notities</h2>
<section class="notes">
    <section class="notes__list">
        {#each notes as note}
            <div class="note">
                <PopNote date={note.date} time={note.time} note={note.note} />
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
        flex-flow: column wrap;
        background-color: #fff;
        height: 100%;
        width: 100%;
        min-width: 100%;
        font-family: "Montserrat", sans-serif;
        border-radius: 1.5rem;
    }

    .notes__list {
        height: 90%;
        max-height: 90%;
        min-width: 100%;
        width: 100%;
        overflow: scroll;
    }

    .notes__header {
        font-size: 1.8rem;
    }

    .notes__form {
        display: flex;
        flex-flow: row nowrap;
        gap: 0.1rem;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        width: 100%;
        margin-top: auto;
        margin-bottom: 1rem;
        box-shadow: inset;
    }

    .notes__form > input {
        height: 4rem;
        width: 80%;
        gap: 1rem;
    }

    .notes__form > button {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;

        border: 1px solid black;
        height: 4rem;
        width: 4rem;
        /* min-height: 100%; */
        width: 10%;
    }

    button:hover {
        cursor: pointer;
    }
</style>
