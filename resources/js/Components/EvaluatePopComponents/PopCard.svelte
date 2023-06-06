<script lang="ts">
    export let pop: object = {
        name: "John Thomas",
        startDate: "01-01-2023",
        endDate: "01-01-2024",
        status: 2,
    };

    let periode: string = pop.startDate + " / " + pop.endDate;
    let status: string =
        pop.status == 1
            ? "Te evalueren"
            : pop.status == 2
            ? "Afspraak ingepland"
            : "Overdue";
</script>

<article class="pop-card">
    <div class="pop-card__status" status={pop.status} />
    <div class="pop-card__content">
        <h3 class="pop-card__heading">{pop.name}</h3>
        <div class="pop-card__row">
            <p class="pop-card__label">Periode</p>
            <p class="pop-card__text">{periode}</p>
        </div>
        <div class="pop-card__row">
            <p class="pop-card__label">Status</p>
            <p class="pop-card__text">{status}</p>
        </div>
    </div>
</article>

<style>
    .pop-card {
        display: grid;
        grid-template-columns: 10% 1fr 10%;
        width: clamp(20rem, 100%, 25rem);
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
    }

    .pop-card__heading {
        font-size: 1.5rem;
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
        font-size: 1rem;
        font-weight: 600;
        margin: 0;
    }

    .pop-card__text {
        font-size: 1rem;
        font-weight: 400;
        margin: 0;
    }
    .pop-card__button {
        grid-column: 3 / span 1;
        width: auto;
        height: 100%;
        border-radius: 0 0.5rem 0.5rem 0;
    }

    .pop-card__status {
        grid-column: 1 / span 1;
        width: auto;
        height: 100%;
        border-radius: 0.5rem 0 0 0.5rem;
    }

    .pop-card__status[status="1"] {
        grid-column-start: 1 / 2;
        height: 100%;
        background-color: var(--c-attention);
    }
    .pop-card__status[status="2"] {
        grid-column-start: 1 / 2;
        height: 100%;
        background-color: var(--color-arcady-green);
    }
    .pop-card__status[status="3"] {
        grid-column-start: 1 / 2;
        height: 100%;
        background-color: var(--c-alert);
    }
</style>
