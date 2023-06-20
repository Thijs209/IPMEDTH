<script lang="ts">
    import { Link } from "@inertiajs/svelte";
    import IconHolder from "./../IconHolder.svelte";
    import MdChevronRight from "svelte-icons/md/MdChevronRight.svelte";

    interface Pop {
        userId?: number;
        popId?: number;
        name: string;
        startDate: string;
        endDate: string;
        status: number;
    }

    export let pop: Pop = {
        userId: 1,
        popId: 1,
        name: "John Thomas",
        startDate: "01-01-2023",
        endDate: "01-01-2024",
        status: 2,
    };

    let periode: string = pop.startDate + " / " + pop.endDate;
    let statusText: String =
        pop.status == 1
            ? "Te evalueren"
            : pop.status == 2
            ? "Afspraak ingepland"
            : "Overtijd";
</script>

<article class="pop-card">
    <div class="pop-card__status" data-status={pop.status} />
    <div class="pop-card__content">
        <h3 class="pop-card__heading">{pop.name}</h3>
        <div class="pop-card__row">
            <p class="pop-card__label">Periode</p>
            <p class="pop-card__text">{periode}</p>
        </div>
        <div class="pop-card__row">
            <p class="pop-card__label">Status</p>
            <p class="pop-card__text">{statusText}</p>
        </div>
    </div>
    <div class="pop-card__button">
        <Link href="/evaluate-pop/users/{pop.userId}/pops/{pop.popId}">
            <IconHolder>
                <MdChevronRight />
            </IconHolder>
        </Link>
    </div>
</article>

<style>
    .pop-card {
        font-size: 1.6rem;
        display: grid;
        grid-template-columns: 10% 1fr 10%;
        width: clamp(30rem, 100%, 35rem);
        height: 8rem;
        border-radius: 0.5rem;
        background-color: white;
        box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.2);
    }

    .pop-card__content {
        grid-column: 2 / span 1;
        width: auto;
        height: 100%;
        border-radius: 0 0.5rem 0.5rem 0;
        padding: 0.5rem;
        font-size: 1.5rem;
    }

    .pop-card__heading {
        font-size: 1.6rem;
        font-weight: 600;
        margin: 0;
    }

    .pop-card__row {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        margin: 0.5rem 0;
    }

    .pop-card__label {
        font-size: 1.2rem;
        font-weight: 600;
        margin: 0;
    }

    .pop-card__text {
        font-size: 1.2rem;
        font-weight: 400;
        margin: 0;
    }
    .pop-card__button {
        grid-column: 3 / span 1;
        width: auto;
        height: 100%;
        border-radius: 0 0.5rem 0.5rem 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pop-card__status {
        grid-column: 1 / span 1;
        width: auto;
        height: 100%;
        border-radius: 0.5rem 0 0 0.5rem;
    }

    .pop-card__status[data-status="1"] {
        grid-column-start: 1 / 2;
        height: 100%;
        background-color: var(--c-attention);
    }
    .pop-card__status[data-status="2"] {
        grid-column-start: 1 / 2;
        height: 100%;
        background-color: var(--color-arcady-green);
    }
    .pop-card__status[data-status="3"] {
        grid-column-start: 1 / 2;
        height: 100%;
        background-color: var(--c-alert);
    }
</style>
