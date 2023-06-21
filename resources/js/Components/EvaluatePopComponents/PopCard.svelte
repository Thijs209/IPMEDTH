<script lang="ts">
    import { Link } from "@inertiajs/svelte";
    import IconHolder from "./../IconHolder.svelte";
    import MdChevronRight from "svelte-icons/md/MdChevronRight.svelte";
    import moment from "moment";

    const POPSTATE = {
        toEvaluate: 1,
        toSchedule: 2,
        overdue: 3,
    };

    interface Pop {
        userId: number;
        popId: number;
        userFinished: boolean;
        userFinishedAt: any;
        evaluatedBy: number;
        evaluationFinished: boolean;
        evaluationFinishedAt: any;
    }

    interface User {
        userId: number;
        firstName: string;
        lastName: string;
        displayName: string;
        email: string;
    }

    export let pop: Pop;
    export let users: User[];

    const date = pop.userFinishedAt;
    const popUser = users.find((user) => user.userId == pop.userId);

    let periode: string =
        moment(date).format("DD-MM-YYYY") +
        " / " +
        moment(date).add(6, "w").format("DD-MM-YYYY");
    // let statusText: String =
    //     pop.status == 1
    //         ? "Te evalueren"
    //         : pop.status == 2
    //         ? "Afspraak ingepland"
    //         : "Overtijd";

    console.log(users);
</script>

<article class="pop-card">
    <div class="pop-card__status" data-status="placeholder" />
    <div class="pop-card__content">
        <h3 class="pop-card__heading">{popUser?.displayName}</h3>
        <div class="pop-card__row">
            <p class="pop-card__label">Periode</p>
            <p class="pop-card__text">{periode}</p>
        </div>
        <div class="pop-card__row">
            <p class="pop-card__label">Status</p>
            <p class="pop-card__text">Te evalueren</p>
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
