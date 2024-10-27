@extends('client.layouts.app')
@section('content')
    <style
        data-vue-ssr-id="6859806e:0 95c58d16:0 35155612:0 1992bd8b:0 9630df1a:0 4d409029:0 e32c5ab0:0 69905ff8:0 aba3cd6e:0 be2918a8:0 7df15387:0 6309d337:0 494b0948:0">

        *,
        ::before,
        ::after {
            box-sizing: border-box;
        }



        html {
            -moz-tab-size: 4;
            -o-tab-size: 4;
            tab-size: 4;
        }



        html {
            line-height: 1.15;
            /* 1 */
            -webkit-text-size-adjust: 100%;
            /* 2 */
        }

        body {
            margin: 0;
        }
        body {
            font-family:
                system-ui,
                -apple-system,
                /* Firefox supports this but not yet `system-ui` */
                'Segoe UI',
                Roboto,
                Helvetica,
                Arial,
                sans-serif,
                'Apple Color Emoji',
                'Segoe UI Emoji';
        }



        .min-h-screen {
            min-height: 100vh;
        }

        .w-3 {
            width: 0.75rem;
        }

        .w-4 {
            width: 1rem;
        }

        .w-5 {
            width: 1.25rem;
        }

        .w-6 {
            width: 1.5rem;
        }

        .w-8 {
            width: 2rem;
        }

        .w-9 {
            width: 2.25rem;
        }

        .w-10 {
            width: 2.5rem;
        }

        .w-12 {
            width: 3rem;
        }

        .w-15 {
            width: 3.75rem;
        }

        .w-16 {
            width: 4rem;
        }

        .w-18 {
            width: 4.5rem;
        }

        .w-20 {
            width: 5rem;
        }

        .w-22 {
            width: 5.5rem;
        }

        .w-24 {
            width: 6rem;
        }

        .w-25 {
            width: 6.25rem;
        }

        .w-27 {
            width: 6.75rem;
        }

        .w-30 {
            width: 7.5rem;
        }

        .w-32 {
            width: 8rem;
        }

        .w-33 {
            width: 8.25rem;
        }

        .w-34 {
            width: 8.5rem;
        }

        .w-35 {
            width: 8.75rem;
        }

        .w-36 {
            width: 9rem;
        }

        .w-40 {
            width: 10rem;
        }

        .w-44 {
            width: 11rem;
        }

        .w-45 {
            width: 11.25rem;
        }

        .w-48 {
            width: 12rem;
        }

        .w-49 {
            width: 12.25rem;
        }

        .w-50 {
            width: 12.5rem;
        }

        .w-51 {
            width: 12.75rem;
        }

        .w-55 {
            width: 13.75rem;
        }

        .w-60 {
            width: 15rem;
        }

        .w-74 {
            width: 18.5rem;
        }

        .w-75 {
            width: 18.75rem;
        }

        .w-80 {
            width: 20rem;
        }

        .w-100 {
            width: 25rem;
        }

        .w-auto {
            width: auto;
        }

        .w-1-5 {
            width: 0.375rem;
        }

        .w-2-5 {
            width: 0.625rem;
        }

        .w-3-5 {
            width: 0.875rem;
        }

        .w-4-5 {
            width: 1.125rem;
        }

        .w-10-5 {
            width: 2.625rem;
        }

        .w-19-25 {
            width: 4.8125rem;
        }

        .w-40-5 {
            width: 10.125rem;
        }

        .w-49-5 {
            width: 12.375rem;
        }

        .w-82-5 {
            width: 20.625rem;
        }

        .w-full-100 {
            width: 100%;
        }

        .w-full-7 {
            width: calc(100% - 1.75rem);
        }

        .w-max {
            width: -moz-max-content;
            width: max-content;
        }

        .w-1\/2 {
            width: 50%;
        }

        .w-1\/3 {
            width: 33.333333%;
        }

        .w-2\/3 {
            width: 66.666667%;
        }

        .w-1\/4 {
            width: 25%;
        }

        .w-2\/4 {
            width: 50%;
        }

        .w-3\/4 {
            width: 75%;
        }

        .w-1\/5 {
            width: 20%;
        }

        .w-2\/5 {
            width: 40%;
        }

        .w-3\/5 {
            width: 60%;
        }

        .w-4\/5 {
            width: 80%;
        }

        .w-5\/6 {
            width: 83.333333%;
        }

        .w-8\/12 {
            width: 66.666667%;
        }

        .w-10\/12 {
            width: 83.333333%;
        }

        .w-full {
            width: 100%;
        }

        .min-w-44 {
            min-width: 11rem;
        }

        .min-w-100 {
            min-width: 25rem;
        }

        .min-w-4-5 {
            min-width: 1.125rem;
        }

        .min-w-23-5 {
            min-width: 5.875rem;
        }

        .min-w-37-5 {
            min-width: 9.375rem;
        }

        .max-w-27 {
            max-width: 6.75rem;
        }

        .max-w-30 {
            max-width: 7.5rem;
        }

        .max-w-75 {
            max-width: 18.75rem;
        }

        .max-w-80 {
            max-width: 20rem;
        }

        .max-w-86 {
            max-width: 21.5rem;
        }

        .max-w-100 {
            max-width: 25rem;
        }

        .max-w-120 {
            max-width: 30rem;
        }

        .max-w-128 {
            max-width: 32rem;
        }

        .max-w-195 {
            max-width: 48.75rem;
        }

        .max-w-225 {
            max-width: 56.25rem;
        }

        .max-w-md {
            max-width: 28rem;
        }

        .max-w-xl {
            max-width: 36rem;
        }

        .max-w-full {
            max-width: 100%;
        }

        .max-w-40-5 {
            max-width: 10.125rem;
        }

        .flex-1 {
            flex: 1 1 0%;
        }

        .flex-none {
            flex: none;
        }

        .flex-grow {
            flex-grow: 1;
        }

        .transform {
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rotate-0 {
            --tw-rotate: 0deg;
        }

        .rotate-180 {
            --tw-rotate: 180deg;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes ping {

            75%,
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        @keyframes pulse {
            50% {
                opacity: .5;
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(-25%);
                animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
            }

            50% {
                transform: none;
                animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .cursor-not-allowed {
            cursor: not-allowed;
        }

        .select-none {
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .resize {
            resize: both;
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .grid-cols-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .grid-cols-5 {
            grid-template-columns: repeat(5, minmax(0, 1fr));
        }

        .grid-cols-8 {
            grid-template-columns: repeat(8, minmax(0, 1fr));
        }

        .flex-row {
            flex-direction: row;
        }

        .flex-col {
            flex-direction: column;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .flex-nowrap {
            flex-wrap: nowrap;
        }

        .items-start {
            align-items: flex-start;
        }

        .items-end {
            align-items: flex-end;
        }

        .items-center {
            align-items: center;
        }

        .items-baseline {
            align-items: baseline;
        }

        .items-stretch {
            align-items: stretch;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .justify-center {
            justify-content: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .justify-around {
            justify-content: space-around;
        }

        .justify-evenly {
            justify-content: space-evenly;
        }

        .gap-3 {
            gap: 0.75rem;
        }

        .gap-4 {
            gap: 1rem;
        }

        .gap-15 {
            gap: 3.75rem;
        }

        .gap-x-2 {
            -moz-column-gap: 0.5rem;
            column-gap: 0.5rem;
        }

        .gap-x-3 {
            -moz-column-gap: 0.75rem;
            column-gap: 0.75rem;
        }

        .gap-x-4 {
            -moz-column-gap: 1rem;
            column-gap: 1rem;
        }

        .overflow-auto {
            overflow: auto;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .overflow-y-auto {
            overflow-y: auto;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .whitespace-pre-line {
            white-space: pre-line;
        }

        .whitespace-pre-wrap {
            white-space: pre-wrap;
        }

        .break-words {
            overflow-wrap: break-word;
        }

        .break-all {
            word-break: break-all;
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .rounded-xl {
            border-radius: 0.75rem;
        }

        .rounded-2xl {
            border-radius: 1rem;
        }

        .rounded-3xl {
            border-radius: 1.5rem;
        }

        .rounded-full {
            border-radius: 9999px;
        }

        .rounded-sm-3 {
            border-radius: 0.1875rem;
        }

        .rounded-sm-5 {
            border-radius: 0.3125rem;
        }

        .rounded-lg-9 {
            border-radius: 0.5625rem;
        }

        .rounded-xl-12 {
            border-radius: 0.75rem;
        }

        .rounded-xl-15 {
            border-radius: 0.9375rem;
        }

        .rounded-2xl-18 {
            border-radius: 1.125rem;
        }

        .rounded-2xl-22 {
            border-radius: 1.375rem;
        }

        .rounded-2xl-44 {
            border-radius: 2.75rem;
        }

        .rounded-3xl-60 {
            border-radius: 3.75rem;
        }

        .rounded-t-xl {
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }

        .rounded-t-2xl {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .rounded-t-xl-15 {
            border-top-left-radius: 0.9375rem;
            border-top-right-radius: 0.9375rem;
        }

        .rounded-b-xl {
            border-bottom-right-radius: 0.75rem;
            border-bottom-left-radius: 0.75rem;
        }

        .rounded-tl-xl {
            border-top-left-radius: 0.75rem;
        }

        .rounded-tl-3xl {
            border-top-left-radius: 1.5rem;
        }

        .rounded-tr-xl {
            border-top-right-radius: 0.75rem;
        }

        .rounded-br-xl {
            border-bottom-right-radius: 0.75rem;
        }

        .rounded-br-3xl {
            border-bottom-right-radius: 1.5rem;
        }

        .border-0 {
            border-width: 0px;
        }

        .border-2 {
            border-width: 2px;
        }

        .border-4 {
            border-width: 4px;
        }

        .border {
            border-width: 1px;
        }

        .border-t {
            border-top-width: 1px;
        }

        .border-r {
            border-right-width: 1px;
        }

        .border-b-2 {
            border-bottom-width: 2px;
        }

        .border-b {
            border-bottom-width: 1px;
        }

        .border-l {
            border-left-width: 1px;
        }

        .border-solid {
            border-style: solid;
        }

        .border-transparent {
            border-color: transparent;
        }

        .border-cdv {
            --tw-border-opacity: 1;
            border-color: rgba(109, 174, 67, var(--tw-border-opacity));
        }

        .border-white-248 {
            --tw-border-opacity: 1;
            border-color: rgba(248, 248, 248, var(--tw-border-opacity));
        }

        .border-white-default {
            --tw-border-opacity: 1;
            border-color: rgba(255, 255, 255, var(--tw-border-opacity));
        }

        .border-orange-573 {
            --tw-border-opacity: 1;
            border-color: rgba(250, 87, 62, var(--tw-border-opacity));
        }

        .border-black-6 {
            border-color: rgba(0, 0, 0, 0.06);
        }

        .border-black-9 {
            border-color: rgba(0, 0, 0, 0.09);
        }

        .border-black-232 {
            --tw-border-opacity: 1;
            border-color: rgba(232, 233, 233, var(--tw-border-opacity));
        }

        .hover\:border-cdv:hover {
            --tw-border-opacity: 1;
            border-color: rgba(109, 174, 67, var(--tw-border-opacity));
        }

        .bg-transparent {
            background-color: transparent;
        }

        .bg-cdv {
            --tw-bg-opacity: 1;
            background-color: rgba(109, 174, 67, var(--tw-bg-opacity));
        }

        .bg-cdv-15 {
            background-color: rgba(109, 174, 67, 0.15);
        }

        .bg-cdv-10 {
            background-color: rgba(109, 174, 67, 0.1);
        }

        .bg-cdv-20 {
            background-color: rgba(109, 174, 67, 0.2);
        }

        .bg-cdv-9 {
            background-color: rgba(109, 174, 67, 0.09);
        }

        .bg-cdv-8 {
            --tw-bg-opacity: 1;
            background-color: rgba(207, 232, 191, var(--tw-bg-opacity));
        }

        .bg-E9F {
            --tw-bg-opacity: 1;
            background-color: rgba(233, 243, 227, var(--tw-bg-opacity));
        }

        .bg-white-217 {
            --tw-bg-opacity: 1;
            background-color: rgba(217, 217, 217, var(--tw-bg-opacity));
        }

        .bg-white-238 {
            --tw-bg-opacity: 1;
            background-color: rgba(238, 238, 238, var(--tw-bg-opacity));
        }

        .bg-white-241 {
            --tw-bg-opacity: 1;
            background-color: rgba(241, 241, 241, var(--tw-bg-opacity));
        }

        .bg-white-245 {
            --tw-bg-opacity: 1;
            background-color: rgba(245, 245, 245, var(--tw-bg-opacity));
        }

        .bg-white-248 {
            --tw-bg-opacity: 1;
            background-color: rgba(248, 248, 248, var(--tw-bg-opacity));
        }

        .bg-white-default {
            --tw-bg-opacity: 1;
            background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
        }

        .bg-orange-573 {
            --tw-bg-opacity: 1;
            background-color: rgba(250, 87, 62, var(--tw-bg-opacity));
        }

        .bg-yellow-15 {
            background-color: #ffbd3817;
        }

        .bg-yellow-255 {
            --tw-bg-opacity: 1;
            background-color: rgba(255, 217, 118, var(--tw-bg-opacity));
        }

        .bg-red-15 {
            background-color: rgba(255, 59, 48, 0.15);
        }

        .bg-red-71 {
            --tw-bg-opacity: 1;
            background-color: rgba(224, 7, 26, var(--tw-bg-opacity));
        }

        .bg-violet-default {
            --tw-bg-opacity: 1;
            background-color: rgba(175, 82, 222, var(--tw-bg-opacity));
        }

        .bg-black-3 {
            background-color: rgba(0, 0, 0, 0.03);
        }

        .bg-black-9 {
            background-color: rgba(0, 0, 0, 0.09);
        }

        .bg-black-60 {
            background-color: rgba(0, 0, 0, 0.6);
        }

        .bg-black-153 {
            --tw-bg-opacity: 1;
            background-color: rgba(153, 153, 153, var(--tw-bg-opacity));
        }

        .bg-black-154 {
            background-color: rgba(153, 153, 153, 0.15);
        }

        .bg-black-232 {
            --tw-bg-opacity: 1;
            background-color: rgba(232, 233, 233, var(--tw-bg-opacity));
        }

        .bg-gray-0 {
            --tw-bg-opacity: 1;
            background-color: rgba(241, 241, 241, var(--tw-bg-opacity));
        }

        .hover\:bg-white-default:hover {
            --tw-bg-opacity: 1;
            background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
        }

        .hover\:bg-orange-228:hover {
            --tw-bg-opacity: 1;
            background-color: rgba(228, 76, 52, var(--tw-bg-opacity));
        }

        .bg-opacity-10 {
            --tw-bg-opacity: 0.1;
        }

        .bg-gradient-auth {
            background-image: linear-gradient(94.78deg, #8CD25A 0%, #5EA72F 100%);
        }

        .bg-gradient-cdv {
            background-image: linear-gradient(to right, #8CD25A, #5EA72F);
        }

        .bg-page-login-author {
            background-image: url('/images/bg-login-author.png');
        }

        .bg-gradient-audiobook {
            background-image: linear-gradient(180deg, rgba(248, 248, 248, 0) 0%, #F8F8F8 95%);
        }

        .bg-open-app {
            background-image: linear-gradient(302.86deg, #0CB98D 0%, #1ED291 100%);
        }

        .bg-cover {
            background-size: cover;
        }

        .bg-no-repeat {
            background-repeat: no-repeat;
        }

        .object-cover {
            -o-object-fit: cover;
            object-fit: cover;
        }

        .p-3 {
            padding: 0.75rem;
        }

        .p-4 {
            padding: 1rem;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .p-8 {
            padding: 2rem;
        }

        .p-0-5 {
            padding: 0.125rem;
        }

        .p-0-75 {
            padding: 0.1875rem;
        }

        .p-1-25 {
            padding: 0.3125rem;
        }

        .p-7-5 {
            padding: 1.875rem;
        }

        .px-0 {
            padding-left: 0px;
            padding-right: 0px;
        }

        .px-1 {
            padding-left: 0.25rem;
            padding-right: 0.25rem;
        }

        .px-2 {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .px-5 {
            padding-left: 1.25rem;
            padding-right: 1.25rem;
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .px-10 {
            padding-left: 2.5rem;
            padding-right: 2.5rem;
        }

        .px-12 {
            padding-left: 3rem;
            padding-right: 3rem;
        }

        .px-14 {
            padding-left: 3.5rem;
            padding-right: 3.5rem;
        }

        .px-15 {
            padding-left: 3.75rem;
            padding-right: 3.75rem;
        }

        .px-20 {
            padding-left: 5rem;
            padding-right: 5rem;
        }

        .px-25 {
            padding-left: 6.25rem;
            padding-right: 6.25rem;
        }

        .px-30 {
            padding-left: 7.5rem;
            padding-right: 7.5rem;
        }

        .px-40 {
            padding-left: 10rem;
            padding-right: 10rem;
        }

        .px-44 {
            padding-left: 11rem;
            padding-right: 11rem;
        }

        .px-50 {
            padding-left: 12.5rem;
            padding-right: 12.5rem;
        }

        .px-1-5 {
            padding-left: 0.375rem;
            padding-right: 0.375rem;
        }

        .px-2-5 {
            padding-left: 0.625rem;
            padding-right: 0.625rem;
        }

        .px-4-5 {
            padding-left: 1.125rem;
            padding-right: 1.125rem;
        }

        .px-5-5 {
            padding-left: 1.375rem;
            padding-right: 1.375rem;
        }

        .px-7-5 {
            padding-left: 1.875rem;
            padding-right: 1.875rem;
        }

        .px-10-5 {
            padding-left: 2.625rem;
            padding-right: 2.625rem;
        }

        .px-12-5 {
            padding-left: 3.125rem;
            padding-right: 3.125rem;
        }

        .px-57-5 {
            padding-left: 14.375rem;
            padding-right: 14.375rem;
        }

        .py-1 {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .py-5 {
            padding-top: 1.25rem;
            padding-bottom: 1.25rem;
        }

        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .py-10 {
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        .py-11 {
            padding-top: 2.75rem;
            padding-bottom: 2.75rem;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .py-14 {
            padding-top: 3.5rem;
            padding-bottom: 3.5rem;
        }

        .py-15 {
            padding-top: 3.75rem;
            padding-bottom: 3.75rem;
        }

        .py-20 {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .py-1-5 {
            padding-top: 0.375rem;
            padding-bottom: 0.375rem;
        }

        .py-2-5 {
            padding-top: 0.625rem;
            padding-bottom: 0.625rem;
        }

        .py-3-5 {
            padding-top: 0.875rem;
            padding-bottom: 0.875rem;
        }

        .py-7-5 {
            padding-top: 1.875rem;
            padding-bottom: 1.875rem;
        }

        .py-10-5 {
            padding-top: 2.625rem;
            padding-bottom: 2.625rem;
        }

        .pt-0 {
            padding-top: 0px;
        }

        .pt-2 {
            padding-top: 0.5rem;
        }

        .pt-3 {
            padding-top: 0.75rem;
        }

        .pt-4 {
            padding-top: 1rem;
        }

        .pt-5 {
            padding-top: 1.25rem;
        }

        .pt-6 {
            padding-top: 1.5rem;
        }

        .pt-7 {
            padding-top: 1.75rem;
        }

        .pt-10 {
            padding-top: 2.5rem;
        }

        .pt-12 {
            padding-top: 3rem;
        }

        .pt-18 {
            padding-top: 4.5rem;
        }

        .pt-20 {
            padding-top: 5rem;
        }

        .pt-25 {
            padding-top: 6.25rem;
        }

        .pt-45 {
            padding-top: 11.25rem;
        }

        .pt-2-5 {
            padding-top: 0.625rem;
        }

        .pt-3-5 {
            padding-top: 0.875rem;
        }

        .pt-4-5 {
            padding-top: 1.125rem;
        }

        .pt-7-5 {
            padding-top: 1.875rem;
        }

        .pt-14-5 {
            padding-top: 3.625rem;
        }

        .pt-22-5 {
            padding-top: 5.625rem;
        }

        .pt-full-150-84 {
            padding-top: calc(calc(100% * 84)/150);
        }

        .pt-full-100 {
            padding-top: 100%;
        }

        .pt-full-160-234 {
            padding-top: calc(calc(100% * 234)/160);
        }

        .pt-full-93-136 {
            padding-top: calc(calc(100% * 136)/93);
        }

        .pt-full-158-108 {
            padding-top: calc(calc(100% * 158)/108);
        }

        .pt-full-400-1580 {
            padding-top: calc(calc(100% * 400)/1580);
        }

        .pt-full-130-336 {
            padding-top: calc(130*100%/336);
        }

        .pt-full-88-60 {
            padding-top: calc(calc(100% * 88)/60);
        }

        .pr-2 {
            padding-right: 0.5rem;
        }

        .pr-3 {
            padding-right: 0.75rem;
        }

        .pr-6 {
            padding-right: 1.5rem;
        }

        .pr-8 {
            padding-right: 2rem;
        }

        .pr-20 {
            padding-right: 5rem;
        }

        .pr-7-5 {
            padding-right: 1.875rem;
        }

        .pb-0 {
            padding-bottom: 0px;
        }

        .pb-2 {
            padding-bottom: 0.5rem;
        }

        .pb-3 {
            padding-bottom: 0.75rem;
        }

        .pb-4 {
            padding-bottom: 1rem;
        }

        .pb-5 {
            padding-bottom: 1.25rem;
        }

        .pb-6 {
            padding-bottom: 1.5rem;
        }

        .pb-10 {
            padding-bottom: 2.5rem;
        }

        .pb-12 {
            padding-bottom: 3rem;
        }

        .pb-14 {
            padding-bottom: 3.5rem;
        }

        .pb-15 {
            padding-bottom: 3.75rem;
        }

        .pb-28 {
            padding-bottom: 7rem;
        }

        .pb-1-5 {
            padding-bottom: 0.375rem;
        }

        .pb-2-5 {
            padding-bottom: 0.625rem;
        }

        .pb-4-5 {
            padding-bottom: 1.125rem;
        }

        .pb-7-5 {
            padding-bottom: 1.875rem;
        }

        .pb-9-5 {
            padding-bottom: 2.375rem;
        }

        .pb-10-5 {
            padding-bottom: 2.625rem;
        }

        .pl-1 {
            padding-left: 0.25rem;
        }

        .pl-2 {
            padding-left: 0.5rem;
        }

        .pl-4 {
            padding-left: 1rem;
        }

        .pl-15 {
            padding-left: 3.75rem;
        }

        .pl-2\.5 {
            padding-left: 0.625rem;
        }

        .pl-4-5 {
            padding-left: 1.125rem;
        }

        .pl-7-5 {
            padding-left: 1.875rem;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-justify {
            text-align: justify;
        }

        .align-baseline {
            vertical-align: baseline;
        }

        .align-middle {
            vertical-align: middle;
        }

        .text-xs {
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .text-base {
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .text-xs-10-12 {
            font-size: 0.625rem;
            line-height: 0.75rem;
        }

        .text-xs-11-20 {
            font-size: 0.688rem;
            line-height: 1.25rem;
        }

        .text-xs-11-13 {
            font-size: 0.688rem;
            line-height: 0.8125rem;
        }

        .text-xs-12-14 {
            font-size: 0.75rem;
            line-height: 0.875rem;
        }

        .text-xs-13-15 {
            font-size: 0.8125rem;
            line-height: 0.9375rem;
        }

        .text-xs-13-16 {
            font-size: 0.8125rem;
            line-height: 1rem;
        }

        .text-sm-14-16 {
            font-size: 0.875rem;
            line-height: 1rem;
        }

        .text-sm-14-18 {
            font-size: 0.875rem;
            line-height: 1.125rem;
        }

        .text-sm-14-20 {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .text-sm-14-24 {
            font-size: 0.875rem;
            line-height: 1.5rem;
        }

        .text-sm-15-16 {
            font-size: 0.9375rem;
            line-height: 1rem;
        }

        .text-sm-15-18 {
            font-size: 0.9375rem;
            line-height: 1.125rem;
        }

        .text-sm-15-24 {
            font-size: 0.9375rem;
            line-height: 1.5rem;
        }

        .text-base-16-19 {
            font-size: 1rem;
            line-height: 1.25rem;
        }

        .text-base-16-20 {
            font-size: 1rem;
            line-height: 1.25rem;
        }

        .text-base-16-24 {
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .text-lg-18-21 {
            font-size: 1.125rem;
            line-height: 1.3125rem;
        }

        .text-lg-18-24 {
            font-size: 1.125rem;
            line-height: 1.5rem;
        }

        .text-lg-18-30 {
            font-size: 1.125rem;
            line-height: 1.875rem;
        }

        .text-2xl-24-28 {
            font-size: 1.5rem;
            line-height: 1.85rem;
        }

        .text-2xl-24-30 {
            font-size: 1.5rem;
            line-height: 1.875rem;
        }

        .text-4xl-36-42 {
            font-size: 2.25rem;
            line-height: 2.625rem;
        }

        .font-normal {
            font-weight: 400;
        }

        .font-medium {
            font-weight: 500;
        }

        .font-semibold {
            font-weight: 600;
        }

        .font-bold {
            font-weight: 700;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .italic {
            font-style: italic;
        }

        .leading-4 {
            line-height: 1rem;
        }

        .leading-6 {
            line-height: 1.5rem;
        }

        .leading-7 {
            line-height: 1.75rem;
        }

        .leading-10 {
            line-height: 2.5rem;
        }

        .tracking-wide {
            letter-spacing: 0.025em;
        }

        .text-cdv {
            --tw-text-opacity: 1;
            color: rgba(109, 174, 67, var(--tw-text-opacity));
        }

        .text-E9F {
            --tw-text-opacity: 1;
            color: rgba(233, 243, 227, var(--tw-text-opacity));
        }

        .text-white-60 {
            color: rgba(255, 255, 255, 0.6);
        }

        .text-white-232 {
            --tw-text-opacity: 1;
            color: rgba(232, 232, 232, var(--tw-text-opacity));
        }

        .text-white-default {
            --tw-text-opacity: 1;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .text-neutral-aaa {
            --tw-text-opacity: 1;
            color: rgba(170, 170, 170, var(--tw-text-opacity));
        }

        .text-orange-106 {
            --tw-text-opacity: 1;
            color: rgba(106, 94, 94, var(--tw-text-opacity));
        }

        .text-orange-573 {
            --tw-text-opacity: 1;
            color: rgba(250, 87, 62, var(--tw-text-opacity));
        }

        .text-yellow-235 {
            --tw-text-opacity: 1;
            color: rgba(255, 189, 56, var(--tw-text-opacity));
        }

        .text-yellow-ff {
            --tw-text-opacity: 1;
            color: rgba(255, 204, 0, var(--tw-text-opacity));
        }

        .text-red-133 {
            --tw-text-opacity: 1;
            color: rgba(204, 65, 51, var(--tw-text-opacity));
        }

        .text-red-default {
            --tw-text-opacity: 1;
            color: rgba(255, 59, 48, var(--tw-text-opacity));
        }

        .text-violet-default {
            --tw-text-opacity: 1;
            color: rgba(175, 82, 222, var(--tw-text-opacity));
        }

        .text-black-102 {
            --tw-text-opacity: 1;
            color: rgba(102, 102, 102, var(--tw-text-opacity));
        }

        .text-black-153 {
            --tw-text-opacity: 1;
            color: rgba(153, 153, 153, var(--tw-text-opacity));
        }

        .text-black-222 {
            --tw-text-opacity: 1;
            color: rgba(34, 34, 34, var(--tw-text-opacity));
        }

        .text-black-888 {
            --tw-text-opacity: 1;
            color: rgba(88, 88, 88, var(--tw-text-opacity));
        }

        .text-black-default {
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity));
        }

        .hover\:text-cdv:hover {
            --tw-text-opacity: 1;
            color: rgba(109, 174, 67, var(--tw-text-opacity));
        }

        .placeholder-black-153::-moz-placeholder {
            --tw-placeholder-opacity: 1;
            color: rgba(153, 153, 153, var(--tw-placeholder-opacity));
        }

        .placeholder-black-153::placeholder {
            --tw-placeholder-opacity: 1;
            color: rgba(153, 153, 153, var(--tw-placeholder-opacity));
        }

        .opacity-50 {
            opacity: 0.5;
        }

        .opacity-80 {
            opacity: 0.8;
        }

        *,
        ::before,
        ::after {
            --tw-shadow: 0 0 #0000;
        }

        .outline-none {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        *,
        ::before,
        ::after {
            --tw-ring-inset: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgba(59, 130, 246, 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
        }

        .filter {
            --tw-blur: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-brightness: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-contrast: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-grayscale: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-hue-rotate: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-invert: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-saturate: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-sepia: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-drop-shadow: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .blur {
            --tw-blur: blur(8px);
        }

        .drop-shadow {
            --tw-drop-shadow: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1)) drop-shadow(0 1px 1px rgba(0, 0, 0, 0.06));
        }

        .backdrop-filter {
            --tw-backdrop-blur: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-backdrop-brightness: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-backdrop-contrast: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-backdrop-grayscale: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-backdrop-hue-rotate: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-backdrop-invert: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-backdrop-opacity: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-backdrop-saturate: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-backdrop-sepia: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
        }

        .transition {
            transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;
            transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
            transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        @media (min-width: 640px) {
            .sm\:ml-4 {
                margin-left: 1rem;
            }

            .sm\:h-6 {
                height: 1.5rem;
            }

            .sm\:w-6 {
                width: 1.5rem;
            }
        }

        @media (min-width: 768px) {}

        @media (min-width: 1024px) {
            .lg\:mt-10 {
                margin-top: 2.5rem;
            }

            .lg\:h-2 {
                height: 0.5rem;
            }

            .lg\:h-10 {
                height: 2.5rem;
            }

            .lg\:w-2 {
                width: 0.5rem;
            }

            .lg\:w-10 {
                width: 2.5rem;
            }

            .lg\:text-sm-14-16 {
                font-size: 0.875rem;
                line-height: 1rem;
            }
        }



        .el-popover:focus,
        .el-popover:focus:active,
        .el-popover__reference:focus:hover,
        .el-popover__reference:focus:not(.focusing) {
            outline-width: 0
        }

        .v-modal-enter {
            animation: v-modal-in .2s ease
        }

        .v-modal-leave {
            animation: v-modal-out .2s ease forwards
        }

        @keyframes v-modal-in {
            0% {
                opacity: 0
            }
        }

        @keyframes v-modal-out {
            to {
                opacity: 0
            }
        }

        .v-modal {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: .5;
            background: #000
        }

        .el-popup-parent--hidden {
            overflow: hidden
        }

        .el-message-box {
            display: inline-block;
            width: 420px;
            padding-bottom: 10px;
            vertical-align: middle;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ebeef5;
            font-size: 18px;
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1);
            text-align: left;
            overflow: hidden;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden
        }

        .el-message-box__wrapper {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center
        }

        .el-message-box__wrapper:after {
            content: "";
            display: inline-block;
            height: 100%;
            width: 0;
            vertical-align: middle
        }

        .el-message-box__header {
            position: relative;
            padding: 15px 15px 10px
        }

        .el-message-box__title {
            padding-left: 0;
            margin-bottom: 0;
            font-size: 18px;
            line-height: 1;
            color: #303133
        }

        .el-message-box__headerbtn {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 0;
            border: none;
            outline: 0;
            background: 0 0;
            font-size: 16px;
            cursor: pointer
        }

        .el-form-item.is-error .el-input__inner,
        .el-form-item.is-error .el-input__inner:focus,
        .el-form-item.is-error .el-textarea__inner,
        .el-form-item.is-error .el-textarea__inner:focus,
        .el-message-box__input input.invalid,
        .el-message-box__input input.invalid:focus {
            border-color: #f56c6c
        }

        .el-message-box__headerbtn .el-message-box__close {
            color: #909399
        }

        .el-message-box__headerbtn:focus .el-message-box__close,
        .el-message-box__headerbtn:hover .el-message-box__close {
            color: #6dae43
        }

        .el-message-box__content {
            padding: 10px 15px;
            color: #606266;
            font-size: 14px
        }

        .el-message-box__container {
            position: relative
        }

        .el-message-box__input {
            padding-top: 15px
        }

        .el-message-box__status {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px !important
        }

        .el-message-box__status:before {
            padding-left: 1px
        }

        .el-message-box__status+.el-message-box__message {
            padding-left: 36px;
            padding-right: 12px
        }

        .el-message-box__status.el-icon-success {
            color: #67c23a
        }

        .el-message-box__status.el-icon-info {
            color: #909399
        }

        .el-message-box__status.el-icon-warning {
            color: #e6a23c
        }

        .el-message-box__status.el-icon-error {
            color: #f56c6c
        }

        .el-message-box__message {
            margin: 0
        }

        .el-message-box__message p {
            margin: 0;
            line-height: 24px
        }

        .el-message-box__errormsg {
            color: #f56c6c;
            font-size: 12px;
            min-height: 18px;
            margin-top: 2px
        }

        .el-message-box__btns {
            padding: 5px 15px 0;
            text-align: right
        }

        .el-message-box__btns button:nth-child(2) {
            margin-left: 10px
        }

        .el-message-box__btns-reverse {
            flex-direction: row-reverse
        }

        .el-message-box--center {
            padding-bottom: 30px
        }

        .el-message-box--center .el-message-box__header {
            padding-top: 30px
        }

        .el-message-box--center .el-message-box__title {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .el-message-box--center .el-message-box__status {
            position: relative;
            top: auto;
            padding-right: 5px;
            text-align: center;
            transform: translateY(-1px)
        }

        .el-message-box--center .el-message-box__message {
            margin-left: 0
        }

        .el-message-box--center .el-message-box__btns,
        .el-message-box--center .el-message-box__content {
            text-align: center
        }

        .el-message-box--center .el-message-box__content {
            padding-left: 27px;
            padding-right: 27px
        }

        .msgbox-fade-enter-active {
            animation: msgbox-fade-in .3s
        }

        .msgbox-fade-leave-active {
            animation: msgbox-fade-out .3s
        }

        @keyframes msgbox-fade-in {
            0% {
                transform: translate3d(0, -20px, 0);
                opacity: 0
            }

            to {
                transform: translateZ(0);
                opacity: 1
            }
        }

        @keyframes msgbox-fade-out {
            0% {
                transform: translateZ(0);
                opacity: 1
            }

            to {
                transform: translate3d(0, -20px, 0);
                opacity: 0
            }
        }

        .el-breadcrumb {
            font-size: 14px;
            line-height: 1
        }

        .el-breadcrumb:after,
        .el-breadcrumb:before {
            display: table;
            content: ""
        }

        .el-breadcrumb:after {
            clear: both
        }

        .el-breadcrumb__separator {
            margin: 0 9px;
            font-weight: 700;
            color: #c0c4cc
        }

        .el-breadcrumb__separator[class*=icon] {
            margin: 0 6px;
            font-weight: 400
        }

        .el-breadcrumb__item {
            float: left
        }

        .el-breadcrumb__inner {
            color: #606266
        }

        .el-breadcrumb__inner.is-link,
        .el-breadcrumb__inner a {
            font-weight: 700;
            text-decoration: none;
            transition: color .2s cubic-bezier(.645, .045, .355, 1);
            color: #303133
        }

        .el-breadcrumb__inner.is-link:hover,
        .el-breadcrumb__inner a:hover {
            color: #6dae43;
            cursor: pointer
        }

        .el-breadcrumb__item:last-child .el-breadcrumb__inner,
        .el-breadcrumb__item:last-child .el-breadcrumb__inner:hover,
        .el-breadcrumb__item:last-child .el-breadcrumb__inner a,
        .el-breadcrumb__item:last-child .el-breadcrumb__inner a:hover {
            font-weight: 400;
            color: #606266;
            cursor: text
        }

        .el-breadcrumb__item:last-child .el-breadcrumb__separator {
            display: none
        }

        .el-form--label-left .el-form-item__label {
            text-align: left
        }

        .el-form--label-top .el-form-item__label {
            float: none;
            display: inline-block;
            text-align: left;
            padding: 0 0 10px
        }

        .el-form--inline .el-form-item {
            display: inline-block;
            margin-right: 10px;
            vertical-align: top
        }

        .el-form--inline .el-form-item__label {
            float: none;
            display: inline-block
        }

        .el-form--inline .el-form-item__content {
            display: inline-block;
            vertical-align: top
        }

        .el-form--inline.el-form--label-top .el-form-item__content {
            display: block
        }

        .el-form-item {
            margin-bottom: 22px
        }

        .el-form-item:after,
        .el-form-item:before {
            display: table;
            content: ""
        }

        .el-form-item:after {
            clear: both
        }

        .el-form-item .el-form-item {
            margin-bottom: 0
        }

        .el-form-item--mini.el-form-item,
        .el-form-item--small.el-form-item {
            margin-bottom: 18px
        }

        .el-form-item .el-input__validateIcon {
            display: none
        }

        .el-form-item--medium .el-form-item__content,
        .el-form-item--medium .el-form-item__label {
            line-height: 36px
        }

        .el-form-item--small .el-form-item__content,
        .el-form-item--small .el-form-item__label {
            line-height: 32px
        }

        .el-form-item--small .el-form-item__error {
            padding-top: 2px
        }

        .el-form-item--mini .el-form-item__content,
        .el-form-item--mini .el-form-item__label {
            line-height: 28px
        }

        .el-form-item--mini .el-form-item__error {
            padding-top: 1px
        }

        .el-form-item__label-wrap {
            float: left
        }

        .el-form-item__label-wrap .el-form-item__label {
            display: inline-block;
            float: none
        }

        .el-form-item__label {
            text-align: right;
            vertical-align: middle;
            float: left;
            font-size: 14px;
            color: #606266;
            line-height: 40px;
            padding: 0 12px 0 0;
            box-sizing: border-box
        }

        .el-form-item__content {
            line-height: 40px;
            position: relative;
            font-size: 14px
        }

        .el-form-item__content:after,
        .el-form-item__content:before {
            display: table;
            content: ""
        }

        .el-form-item__content:after {
            clear: both
        }

        .el-form-item__content .el-input-group {
            vertical-align: top
        }

        .el-form-item__error {
            color: #f56c6c;
            font-size: 12px;
            line-height: 1;
            padding-top: 4px;
            position: absolute;
            top: 100%;
            left: 0
        }

        .el-form-item__error--inline {
            position: relative;
            top: auto;
            left: auto;
            display: inline-block;
            margin-left: 10px
        }

        .el-form-item.is-required:not(.is-no-asterisk) .el-form-item__label-wrap>.el-form-item__label:before,
        .el-form-item.is-required:not(.is-no-asterisk)>.el-form-item__label:before {
            content: "*";
            color: #f56c6c;
            margin-right: 4px
        }

        .el-form-item.is-error .el-input-group__append .el-input__inner,
        .el-form-item.is-error .el-input-group__prepend .el-input__inner {
            border-color: transparent
        }

        .el-form-item.is-error .el-input__validateIcon {
            color: #f56c6c
        }

        .el-form-item--feedback .el-input__validateIcon {
            display: inline-block
        }

        .el-tabs__header {
            padding: 0;
            position: relative;
            margin: 0 0 15px
        }

        .el-tabs__active-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 2px;
            background-color: #6dae43;
            z-index: 1;
            transition: transform .3s cubic-bezier(.645, .045, .355, 1);
            list-style: none
        }

        .el-tabs__new-tab {
            float: right;
            border: 1px solid #d3dce6;
            height: 18px;
            width: 18px;
            line-height: 18px;
            margin: 12px 0 9px 10px;
            border-radius: 3px;
            text-align: center;
            font-size: 12px;
            color: #d3dce6;
            cursor: pointer;
            transition: all .15s
        }

        .el-tabs__new-tab .el-icon-plus {
            transform: scale(.8)
        }

        .el-tabs__new-tab:hover {
            color: #6dae43
        }

        .el-tabs__nav-wrap {
            overflow: hidden;
            margin-bottom: -1px;
            position: relative
        }

        .el-tabs__nav-wrap:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background-color: #e4e7ed;
            z-index: 1
        }

        .el-tabs__nav-wrap.is-scrollable {
            padding: 0 20px;
            box-sizing: border-box
        }

        .el-tabs__nav-scroll {
            overflow: hidden
        }

        .el-tabs__nav-next,
        .el-tabs__nav-prev {
            position: absolute;
            cursor: pointer;
            line-height: 44px;
            font-size: 12px;
            color: #909399
        }

        .el-tabs__nav-next {
            right: 0
        }

        .el-tabs__nav-prev {
            left: 0
        }

        .el-tabs__nav {
            white-space: nowrap;
            position: relative;
            transition: transform .3s;
            float: left;
            z-index: 2
        }

        .el-tabs__nav.is-stretch {
            min-width: 100%;
            display: flex
        }

        .el-tabs__nav.is-stretch>* {
            flex: 1;
            text-align: center
        }

        .el-tabs__item {
            padding: 0 20px;
            height: 40px;
            box-sizing: border-box;
            line-height: 40px;
            display: inline-block;
            list-style: none;
            font-size: 14px;
            font-weight: 500;
            color: #303133;
            position: relative
        }

        .el-tabs__item:focus,
        .el-tabs__item:focus:active {
            outline: 0
        }

        .el-tabs__item:focus.is-active.is-focus:not(:active) {
            box-shadow: inset 0 0 2px 2px #6dae43;
            border-radius: 3px
        }

        .el-tabs__item .el-icon-close {
            border-radius: 50%;
            text-align: center;
            transition: all .3s cubic-bezier(.645, .045, .355, 1);
            margin-left: 5px
        }

        .el-tabs__item .el-icon-close:before {
            transform: scale(.9);
            display: inline-block
        }

        .el-tabs--card>.el-tabs__header .el-tabs__active-bar,
        .el-tabs--left.el-tabs--card .el-tabs__active-bar.is-left,
        .el-tabs--right.el-tabs--card .el-tabs__active-bar.is-right {
            display: none
        }




        .el-tree {
            position: relative;
            cursor: default;
            background: #fff;
            color: #606266
        }

        .el-tree__empty-block {
            position: relative;
            min-height: 60px;
            text-align: center;
            width: 100%;
            height: 100%
        }

        .el-tree__empty-text {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            color: #909399;
            font-size: 14px
        }

        .el-tree__drop-indicator {
            position: absolute;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #6dae43
        }

        .el-tree-node {
            white-space: nowrap;
            outline: 0
        }

        .el-tree-node:focus>.el-tree-node__content {
            background-color: #f5f7fa
        }

        .el-tree-node.is-drop-inner>.el-tree-node__content .el-tree-node__label {
            background-color: #6dae43;
            color: #fff
        }

        .el-tree-node__content:hover,
        .el-upload-list__item:hover {
            background-color: #f5f7fa
        }

        .el-tree-node__content {
            display: flex;
            align-items: center;
            height: 26px;
            cursor: pointer
        }

        .el-tree-node__content>.el-tree-node__expand-icon {
            padding: 6px
        }

        .el-tree-node__content>label.el-checkbox {
            margin-right: 8px
        }

        .el-tree.is-dragging .el-tree-node__content {
            cursor: move
        }

        .el-tree.is-dragging .el-tree-node__content * {
            pointer-events: none
        }

        .el-tree.is-dragging.is-drop-not-allow .el-tree-node__content {
            cursor: not-allowed
        }

        .el-tree-node__expand-icon {
            cursor: pointer;
            color: #c0c4cc;
            font-size: 12px;
            transform: rotate(0);
            transition: transform .3s ease-in-out
        }

        .el-tree-node__expand-icon.expanded {
            transform: rotate(90deg)
        }

        .el-tree-node__expand-icon.is-leaf {
            color: transparent;
            cursor: default
        }

        .el-tree-node__label {
            font-size: 14px
        }

        .el-tree-node__loading-icon {
            margin-right: 8px;
            font-size: 14px;
            color: #c0c4cc
        }

        .el-tree-node>.el-tree-node__children {
            overflow: hidden;
            background-color: transparent
        }

        .el-tree-node.is-expanded>.el-tree-node__children {
            display: block
        }

        .el-tree--highlight-current .el-tree-node.is-current>.el-tree-node__content {
            background-color: #f0f7ff
        }

        .el-alert,
        .el-notification,
        .el-slider__button,
        .el-slider__stop {
            background-color: #fff
        }

        .el-alert {
            width: 100%;
            padding: 8px 16px;
            margin: 0;
            box-sizing: border-box;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
            opacity: 1;
            display: flex;
            align-items: center;
            transition: opacity .2s
        }

        .el-alert.is-light .el-alert__closebtn {
            color: #c0c4cc
        }

        .el-alert.is-dark .el-alert__closebtn,
        .el-alert.is-dark .el-alert__description {
            color: #fff
        }

        .el-alert.is-center {
            justify-content: center
        }

        .el-alert--success.is-light {
            background-color: #f0f9eb;
            color: #67c23a
        }

        .el-alert--success.is-light .el-alert__description {
            color: #67c23a
        }

        .el-alert--success.is-dark {
            background-color: #67c23a;
            color: #fff
        }

        .el-alert--info.is-light {
            background-color: #f4f4f5;
            color: #909399
        }

        .el-alert--info.is-dark {
            background-color: #909399;
            color: #fff
        }

        .el-alert--info .el-alert__description {
            color: #909399
        }

        .el-alert--warning.is-light {
            background-color: #fdf6ec;
            color: #e6a23c
        }

        .el-alert--warning.is-light .el-alert__description {
            color: #e6a23c
        }

        .el-alert--warning.is-dark {
            background-color: #e6a23c;
            color: #fff
        }

        .el-alert--error.is-light {
            background-color: #fef0f0;
            color: #f56c6c
        }

        .el-alert--error.is-light .el-alert__description {
            color: #f56c6c
        }

        .el-alert--error.is-dark {
            background-color: #f56c6c;
            color: #fff
        }

        .el-alert__content {
            display: table-cell;
            padding: 0 8px
        }

        .el-alert__icon {
            font-size: 16px;
            width: 16px
        }

        .el-alert__icon.is-big {
            font-size: 28px;
            width: 28px
        }

        .el-alert__title {
            font-size: 13px;
            line-height: 18px
        }

        .el-alert__title.is-bold {
            font-weight: 700
        }

        .el-alert .el-alert__description {
            font-size: 12px;
            margin: 5px 0 0
        }

        .el-alert__closebtn {
            font-size: 12px;
            opacity: 1;
            position: absolute;
            top: 12px;
            right: 15px;
            cursor: pointer
        }

        .el-alert-fade-enter,
        .el-alert-fade-leave-active,
        .el-loading-fade-enter,
        .el-loading-fade-leave-active,
        .el-notification-fade-leave-active,
        .el-upload iframe {
            opacity: 0
        }

        .el-alert__closebtn.is-customed {
            font-style: normal;
            font-size: 13px;
            top: 9px
        }

        .el-notification {
            display: flex;
            width: 330px;
            padding: 14px 26px 14px 13px;
            border-radius: 8px;
            box-sizing: border-box;
            border: 1px solid #ebeef5;
            position: fixed;
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1);
            transition: opacity .3s, transform .3s, left .3s, right .3s, top .4s, bottom .3s;
            overflow: hidden
        }

        .el-notification.right {
            right: 16px
        }

        .el-notification.left {
            left: 16px
        }

        .el-notification__group {
            margin-left: 13px;
            margin-right: 8px
        }

        .el-notification__title {
            font-weight: 700;
            font-size: 16px;
            color: #303133;
            margin: 0
        }

        .el-notification__content {
            font-size: 14px;
            line-height: 21px;
            margin: 6px 0 0;
            color: #606266;
            text-align: justify
        }

        .el-notification__content p {
            margin: 0
        }

        .el-notification__icon {
            height: 24px;
            width: 24px;
            font-size: 24px
        }

        .el-notification__closeBtn {
            position: absolute;
            top: 18px;
            right: 15px;
            cursor: pointer;
            color: #909399;
            font-size: 16px
        }

        .el-notification__closeBtn:hover {
            color: #606266
        }

        .el-notification .el-icon-success {
            color: #67c23a
        }

        .el-notification .el-icon-error {
            color: #f56c6c
        }

        .el-notification .el-icon-info {
            color: #909399
        }

        .el-notification .el-icon-warning {
            color: #e6a23c
        }

        .el-notification-fade-enter.right {
            right: 0;
            transform: translateX(100%)
        }

        .el-notification-fade-enter.left {
            left: 0;
            transform: translateX(-100%)
        }

        .el-input-number {
            position: relative;
            display: inline-block;
            width: 180px;
            line-height: 38px
        }

        .el-input-number .el-input {
            display: block
        }

        .el-input-number .el-input__inner {
            -webkit-appearance: none;
            padding-left: 50px;
            padding-right: 50px;
            text-align: center
        }

        .el-input-number__decrease,
        .el-input-number__increase {
            position: absolute;
            z-index: 1;
            top: 1px;
            width: 40px;
            height: auto;
            text-align: center;
            background: #f5f7fa;
            color: #606266;
            cursor: pointer;
            font-size: 13px
        }

        .el-input-number__decrease:hover,
        .el-input-number__increase:hover {
            color: #6dae43
        }

        .el-input-number__decrease:hover:not(.is-disabled)~.el-input .el-input__inner:not(.is-disabled),
        .el-input-number__increase:hover:not(.is-disabled)~.el-input .el-input__inner:not(.is-disabled) {
            border-color: #6dae43
        }

        .el-input-number__decrease.is-disabled,
        .el-input-number__increase.is-disabled {
            color: #c0c4cc;
            cursor: not-allowed
        }

        .el-input-number__increase {
            right: 1px;
            border-radius: 0 4px 4px 0;
            border-left: 1px solid #dcdfe6
        }

        .el-input-number__decrease {
            left: 1px;
            border-radius: 4px 0 0 4px;
            border-right: 1px solid #dcdfe6
        }

        .el-input-number.is-disabled .el-input-number__decrease,
        .el-input-number.is-disabled .el-input-number__increase {
            border-color: #e4e7ed;
            color: #e4e7ed
        }

        .el-input-number.is-disabled .el-input-number__decrease:hover,
        .el-input-number.is-disabled .el-input-number__increase:hover {
            color: #e4e7ed;
            cursor: not-allowed
        }

        .el-input-number--medium {
            width: 200px;
            line-height: 34px
        }

        .el-input-number--medium .el-input-number__decrease,
        .el-input-number--medium .el-input-number__increase {
            width: 36px;
            font-size: 14px
        }

        .el-input-number--medium .el-input__inner {
            padding-left: 43px;
            padding-right: 43px
        }

        .el-input-number--small {
            width: 130px;
            line-height: 30px
        }

        .el-input-number--small .el-input-number__decrease,
        .el-input-number--small .el-input-number__increase {
            width: 32px;
            font-size: 13px
        }

        .el-input-number--small .el-input-number__decrease [class*=el-icon],
        .el-input-number--small .el-input-number__increase [class*=el-icon] {
            transform: scale(.9)
        }

        .el-input-number--small .el-input__inner {
            padding-left: 39px;
            padding-right: 39px
        }

        .el-input-number--mini {
            width: 130px;
            line-height: 26px
        }

        .el-input-number--mini .el-input-number__decrease,
        .el-input-number--mini .el-input-number__increase {
            width: 28px;
            font-size: 12px
        }

        .el-input-number--mini .el-input-number__decrease [class*=el-icon],
        .el-input-number--mini .el-input-number__increase [class*=el-icon] {
            transform: scale(.8)
        }

        .el-input-number--mini .el-input__inner {
            padding-left: 35px;
            padding-right: 35px
        }

        .el-input-number.is-without-controls .el-input__inner {
            padding-left: 15px;
            padding-right: 15px
        }

        .el-input-number.is-controls-right .el-input__inner {
            padding-left: 15px;
            padding-right: 50px
        }

        .el-input-number.is-controls-right .el-input-number__decrease,
        .el-input-number.is-controls-right .el-input-number__increase {
            height: auto;
            line-height: 19px
        }

        .el-input-number.is-controls-right .el-input-number__decrease [class*=el-icon],
        .el-input-number.is-controls-right .el-input-number__increase [class*=el-icon] {
            transform: scale(.8)
        }

        .el-input-number.is-controls-right .el-input-number__increase {
            border-radius: 0 4px 0 0;
            border-bottom: 1px solid #dcdfe6
        }

        .el-input-number.is-controls-right .el-input-number__decrease {
            right: 1px;
            bottom: 1px;
            top: auto;
            left: auto;
            border-right: none;
            border-left: 1px solid #dcdfe6;
            border-radius: 0 0 4px
        }

        .el-input-number.is-controls-right[class*=medium] [class*=decrease],
        .el-input-number.is-controls-right[class*=medium] [class*=increase] {
            line-height: 17px
        }

        .el-input-number.is-controls-right[class*=small] [class*=decrease],
        .el-input-number.is-controls-right[class*=small] [class*=increase] {
            line-height: 15px
        }

        .el-input-number.is-controls-right[class*=mini] [class*=decrease],
        .el-input-number.is-controls-right[class*=mini] [class*=increase] {
            line-height: 13px
        }

        .el-tooltip:focus:hover,
        .el-tooltip:focus:not(.focusing) {
            outline-width: 0
        }

        .el-tooltip__popper {
            position: absolute;
            border-radius: 4px;
            padding: 10px;
            z-index: 2000;
            font-size: 12px;
            line-height: 1.2;
            min-width: 10px;
            word-wrap: break-word
        }

        .el-tooltip__popper .popper__arrow,
        .el-tooltip__popper .popper__arrow:after {
            position: absolute;
            display: block;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid
        }

        .el-tooltip__popper .popper__arrow {
            border-width: 6px
        }

        .el-tooltip__popper .popper__arrow:after {
            content: " ";
            border-width: 5px
        }

        .el-button-group:after,
        .el-button-group:before,
        .el-color-dropdown__main-wrapper:after,
        .el-link.is-underline:hover:after,
        .el-page-header__left:after,
        .el-progress-bar__inner:after,
        .el-row:after,
        .el-row:before,
        .el-slider:after,
        .el-slider:before,
        .el-slider__button-wrapper:after,
        .el-transfer-panel .el-transfer-panel__footer:after,
        .el-upload-cover:after,
        .el-upload-list--picture-card .el-upload-list__item-actions:after {
            content: ""
        }

        .el-tooltip__popper[x-placement^=top] {
            margin-bottom: 12px
        }

        .el-tooltip__popper[x-placement^=top] .popper__arrow {
            bottom: -6px;
            border-top-color: #303133;
            border-bottom-width: 0
        }

        .el-tooltip__popper[x-placement^=top] .popper__arrow:after {
            bottom: 1px;
            margin-left: -5px;
            border-top-color: #303133;
            border-bottom-width: 0
        }

        .el-tooltip__popper[x-placement^=bottom] {
            margin-top: 12px
        }

        .el-tooltip__popper[x-placement^=bottom] .popper__arrow {
            top: -6px;
            border-top-width: 0;
            border-bottom-color: #303133
        }

        .el-tooltip__popper[x-placement^=bottom] .popper__arrow:after {
            top: 1px;
            margin-left: -5px;
            border-top-width: 0;
            border-bottom-color: #303133
        }

        .el-tooltip__popper[x-placement^=right] {
            margin-left: 12px
        }

        .el-tooltip__popper[x-placement^=right] .popper__arrow {
            left: -6px;
            border-right-color: #303133;
            border-left-width: 0
        }

        .el-tooltip__popper[x-placement^=right] .popper__arrow:after {
            bottom: -5px;
            left: 1px;
            border-right-color: #303133;
            border-left-width: 0
        }

        .el-tooltip__popper[x-placement^=left] {
            margin-right: 12px
        }

        .el-tooltip__popper[x-placement^=left] .popper__arrow {
            right: -6px;
            border-right-width: 0;
            border-left-color: #303133
        }

        .el-tooltip__popper[x-placement^=left] .popper__arrow:after {
            right: 1px;
            bottom: -5px;
            margin-left: -5px;
            border-right-width: 0;
            border-left-color: #303133
        }

        .el-tooltip__popper.is-dark {
            background: #303133;
            color: #fff
        }

        .el-tooltip__popper.is-light {
            background: #fff;
            border: 1px solid #303133
        }

        .el-tooltip__popper.is-light[x-placement^=top] .popper__arrow {
            border-top-color: #303133
        }

        .el-tooltip__popper.is-light[x-placement^=top] .popper__arrow:after {
            border-top-color: #fff
        }

        .el-tooltip__popper.is-light[x-placement^=bottom] .popper__arrow {
            border-bottom-color: #303133
        }

        .el-tooltip__popper.is-light[x-placement^=bottom] .popper__arrow:after {
            border-bottom-color: #fff
        }

        .el-tooltip__popper.is-light[x-placement^=left] .popper__arrow {
            border-left-color: #303133
        }

        .el-tooltip__popper.is-light[x-placement^=left] .popper__arrow:after {
            border-left-color: #fff
        }

        .el-tooltip__popper.is-light[x-placement^=right] .popper__arrow {
            border-right-color: #303133
        }

        .el-tooltip__popper.is-light[x-placement^=right] .popper__arrow:after {
            border-right-color: #fff
        }

        .el-slider:after,
        .el-slider:before {
            display: table
        }

        .el-slider__button-wrapper .el-tooltip,
        .el-slider__button-wrapper:after {
            display: inline-block;
            vertical-align: middle
        }

        .el-slider:after {
            clear: both
        }

        .el-slider__runway {
            width: 100%;
            height: 6px;
            margin: 16px 0;
            background-color: #e4e7ed;
            border-radius: 3px;
            position: relative;
            cursor: pointer;
            vertical-align: middle
        }

        .el-slider__runway.show-input {
            margin-right: 160px;
            width: auto
        }

        .el-slider__runway.disabled {
            cursor: default
        }

        .el-slider__runway.disabled .el-slider__bar {
            background-color: #c0c4cc
        }

        .el-slider__runway.disabled .el-slider__button {
            border-color: #c0c4cc
        }

        .el-slider__runway.disabled .el-slider__button-wrapper.dragging,
        .el-slider__runway.disabled .el-slider__button-wrapper.hover,
        .el-slider__runway.disabled .el-slider__button-wrapper:hover {
            cursor: not-allowed
        }

        .el-slider__runway.disabled .el-slider__button.dragging,
        .el-slider__runway.disabled .el-slider__button.hover,
        .el-slider__runway.disabled .el-slider__button:hover {
            transform: scale(1);
            cursor: not-allowed
        }

        .el-slider__input {
            float: right;
            margin-top: 3px;
            width: 130px
        }

        .el-slider__input.el-input-number--mini {
            margin-top: 5px
        }

        .el-slider__input.el-input-number--medium {
            margin-top: 0
        }

        .el-slider__input.el-input-number--large {
            margin-top: -2px
        }

        .el-slider__bar {
            height: 6px;
            background-color: #6dae43;
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
            position: absolute
        }

        .el-slider__button-wrapper {
            height: 36px;
            width: 36px;
            position: absolute;
            z-index: 1001;
            top: -15px;
            transform: translateX(-50%);
            background-color: transparent;
            text-align: center;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            line-height: normal
        }

        .el-button,
        .el-checkbox,
        .el-checkbox-button__inner,
        .el-empty__image img,
        .el-image-viewer__btn,
        .el-radio,
        .el-slider__button,
        .el-slider__button-wrapper,
        .el-step__icon-inner {
            -moz-user-select: none;
            -ms-user-select: none
        }

        .el-slider__button-wrapper:after {
            height: 100%
        }

        .el-slider__button-wrapper.hover,
        .el-slider__button-wrapper:hover {
            cursor: grab
        }

        .el-slider__button-wrapper.dragging {
            cursor: grabbing
        }

        .el-slider__button {
            width: 16px;
            height: 16px;
            border: 2px solid #6dae43;
            border-radius: 50%;
            transition: .2s;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none
        }

        .el-slider__button.dragging,
        .el-slider__button.hover,
        .el-slider__button:hover {
            transform: scale(1.2)
        }

        .el-slider__button.hover,
        .el-slider__button:hover {
            cursor: grab
        }

        .el-slider__button.dragging {
            cursor: grabbing
        }

        .el-slider__stop {
            position: absolute;
            height: 6px;
            width: 6px;
            border-radius: 100%;
            transform: translateX(-50%)
        }

        .el-slider__marks {
            top: 0;
            left: 12px;
            width: 18px;
            height: 100%
        }

        .el-slider__marks-text {
            position: absolute;
            transform: translateX(-50%);
            font-size: 14px;
            color: #909399;
            margin-top: 15px
        }

        .el-slider.is-vertical {
            position: relative
        }

        .el-slider.is-vertical .el-slider__runway {
            width: 6px;
            height: 100%;
            margin: 0 16px
        }

        .el-slider.is-vertical .el-slider__bar {
            width: 6px;
            height: auto;
            border-radius: 0 0 3px 3px
        }

        .el-slider.is-vertical .el-slider__button-wrapper {
            top: auto;
            left: -15px
        }

        .el-slider.is-vertical .el-slider__button-wrapper,
        .el-slider.is-vertical .el-slider__stop {
            transform: translateY(50%)
        }

        .el-slider.is-vertical.el-slider--with-input {
            padding-bottom: 58px
        }

        .el-slider.is-vertical.el-slider--with-input .el-slider__input {
            overflow: visible;
            float: none;
            position: absolute;
            bottom: 22px;
            width: 36px;
            margin-top: 15px
        }

        .el-slider.is-vertical.el-slider--with-input .el-slider__input .el-input__inner {
            text-align: center;
            padding-left: 5px;
            padding-right: 5px
        }

        .el-slider.is-vertical.el-slider--with-input .el-slider__input .el-input-number__decrease,
        .el-slider.is-vertical.el-slider--with-input .el-slider__input .el-input-number__increase {
            top: 32px;
            margin-top: -1px;
            border: 1px solid #dcdfe6;
            line-height: 20px;
            box-sizing: border-box;
            transition: border-color .2s cubic-bezier(.645, .045, .355, 1)
        }

        .el-slider.is-vertical.el-slider--with-input .el-slider__input .el-input-number__decrease {
            width: 18px;
            right: 18px;
            border-bottom-left-radius: 4px
        }

        .el-slider.is-vertical.el-slider--with-input .el-slider__input .el-input-number__increase {
            width: 19px;
            border-bottom-right-radius: 4px
        }

        .el-slider.is-vertical.el-slider--with-input .el-slider__input .el-input-number__increase~.el-input .el-input__inner {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0
        }

        .el-slider.is-vertical.el-slider--with-input .el-slider__input:hover .el-input-number__decrease,
        .el-slider.is-vertical.el-slider--with-input .el-slider__input:hover .el-input-number__increase {
            border-color: #c0c4cc
        }

        .el-slider.is-vertical.el-slider--with-input .el-slider__input:active .el-input-number__decrease,
        .el-slider.is-vertical.el-slider--with-input .el-slider__input:active .el-input-number__increase {
            border-color: #6dae43
        }

        .el-slider.is-vertical .el-slider__marks-text {
            margin-top: 0;
            left: 15px;
            transform: translateY(50%)
        }

        .el-loading-parent--relative {
            position: relative !important
        }

        .el-loading-parent--hidden {
            overflow: hidden !important
        }

        .el-loading-mask {
            position: absolute;
            z-index: 2000;
            background-color: hsla(0, 0%, 100%, .9);
            margin: 0;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            transition: opacity .3s
        }

        .el-loading-mask.is-fullscreen {
            position: fixed
        }

        .el-loading-mask.is-fullscreen .el-loading-spinner {
            margin-top: -25px
        }

        .el-loading-mask.is-fullscreen .el-loading-spinner .circular {
            height: 50px;
            width: 50px
        }

        .el-loading-spinner {
            top: 50%;
            margin-top: -21px;
            width: 100%;
            text-align: center;
            position: absolute
        }

        .el-col-pull-0,
        .el-col-pull-1,
        .el-col-pull-2,
        .el-col-pull-3,
        .el-col-pull-4,
        .el-col-pull-5,
        .el-col-pull-6,
        .el-col-pull-7,
        .el-col-pull-8,
        .el-col-pull-9,
        .el-col-pull-10,
        .el-col-pull-11,
        .el-col-pull-12,
        .el-col-pull-13,
        .el-col-pull-14,
        .el-col-pull-15,
        .el-col-pull-16,
        .el-col-pull-17,
        .el-col-pull-18,
        .el-col-pull-19,
        .el-col-pull-20,
        .el-col-pull-21,
        .el-col-pull-22,
        .el-col-pull-23,
        .el-col-pull-24,
        .el-col-push-0,
        .el-col-push-1,
        .el-col-push-2,
        .el-col-push-3,
        .el-col-push-4,
        .el-col-push-5,
        .el-col-push-6,
        .el-col-push-7,
        .el-col-push-8,
        .el-col-push-9,
        .el-col-push-10,
        .el-col-push-11,
        .el-col-push-12,
        .el-col-push-13,
        .el-col-push-14,
        .el-col-push-15,
        .el-col-push-16,
        .el-col-push-17,
        .el-col-push-18,
        .el-col-push-19,
        .el-col-push-20,
        .el-col-push-21,
        .el-col-push-22,
        .el-col-push-23,
        .el-col-push-24,
        .el-row,
        .el-upload-dragger,
        .el-upload-list__item {
            position: relative
        }

        .el-loading-spinner .el-loading-text {
            color: #6dae43;
            margin: 3px 0;
            font-size: 14px
        }

        .el-loading-spinner .circular {
            height: 42px;
            width: 42px;
            animation: loading-rotate 2s linear infinite
        }

        .el-loading-spinner .path {
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-dasharray: 90, 150;
            stroke-dashoffset: 0;
            stroke-width: 2;
            stroke: #6dae43;
            stroke-linecap: round
        }

        .el-loading-spinner i {
            color: #6dae43
        }

        @keyframes loading-rotate {
            to {
                transform: rotate(1turn)
            }
        }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0
            }

            50% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -40px
            }

            to {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -120px
            }
        }

        .el-row {
            box-sizing: border-box
        }

        .el-row:after,
        .el-row:before {
            display: table
        }

        .el-row:after {
            clear: both
        }

        .el-row--flex {
            display: flex
        }

        .el-col-0,
        .el-row--flex:after,
        .el-row--flex:before {
            display: none
        }

        .el-row--flex.is-justify-center {
            justify-content: center
        }

        .el-row--flex.is-justify-end {
            justify-content: flex-end
        }

        .el-row--flex.is-justify-space-between {
            justify-content: space-between
        }

        .el-row--flex.is-justify-space-around {
            justify-content: space-around
        }

        .el-row--flex.is-align-top {
            align-items: flex-start
        }

        .el-row--flex.is-align-middle {
            align-items: center
        }

        .el-row--flex.is-align-bottom {
            align-items: flex-end
        }

        [class*=el-col-] {
            float: left;
            box-sizing: border-box
        }

        .el-col-0 {
            width: 0
        }

        .el-col-pull-0 {
            right: 0
        }

        .el-col-push-0 {
            left: 0
        }

        .el-col-1 {
            width: 4.16667%
        }

        .el-col-offset-1 {
            margin-left: 4.16667%
        }

        .el-col-pull-1 {
            right: 4.16667%
        }

        .el-col-push-1 {
            left: 4.16667%
        }

        .el-col-2 {
            width: 8.33333%
        }

        .el-col-offset-2 {
            margin-left: 8.33333%
        }

        .el-col-pull-2 {
            right: 8.33333%
        }

        .el-col-push-2 {
            left: 8.33333%
        }

        .el-col-3 {
            width: 12.5%
        }

        .el-col-offset-3 {
            margin-left: 12.5%
        }

        .el-col-pull-3 {
            right: 12.5%
        }

        .el-col-push-3 {
            left: 12.5%
        }

        .el-col-4 {
            width: 16.66667%
        }

        .el-col-offset-4 {
            margin-left: 16.66667%
        }

        .el-col-pull-4 {
            right: 16.66667%
        }

        .el-col-push-4 {
            left: 16.66667%
        }

        .el-col-5 {
            width: 20.83333%
        }

        .el-col-offset-5 {
            margin-left: 20.83333%
        }

        .el-col-pull-5 {
            right: 20.83333%
        }

        .el-col-push-5 {
            left: 20.83333%
        }

        .el-col-6 {
            width: 25%
        }

        .el-col-offset-6 {
            margin-left: 25%
        }

        .el-col-pull-6 {
            right: 25%
        }

        .el-col-push-6 {
            left: 25%
        }

        .el-col-7 {
            width: 29.16667%
        }

        .el-col-offset-7 {
            margin-left: 29.16667%
        }

        .el-col-pull-7 {
            right: 29.16667%
        }

        .el-col-push-7 {
            left: 29.16667%
        }

        .el-col-8 {
            width: 33.33333%
        }

        .el-col-offset-8 {
            margin-left: 33.33333%
        }

        .el-col-pull-8 {
            right: 33.33333%
        }

        .el-col-push-8 {
            left: 33.33333%
        }

        .el-col-9 {
            width: 37.5%
        }

        .el-col-offset-9 {
            margin-left: 37.5%
        }

        .el-col-pull-9 {
            right: 37.5%
        }

        .el-col-push-9 {
            left: 37.5%
        }

        .el-col-10 {
            width: 41.66667%
        }

        .el-col-offset-10 {
            margin-left: 41.66667%
        }

        .el-col-pull-10 {
            right: 41.66667%
        }

        .el-col-push-10 {
            left: 41.66667%
        }

        .el-col-11 {
            width: 45.83333%
        }

        .el-col-offset-11 {
            margin-left: 45.83333%
        }

        .el-col-pull-11 {
            right: 45.83333%
        }

        .el-col-push-11 {
            left: 45.83333%
        }

        .el-col-12 {
            width: 50%
        }

        .el-col-offset-12 {
            margin-left: 50%
        }

        .el-col-pull-12 {
            right: 50%
        }

        .el-col-push-12 {
            left: 50%
        }

        .el-col-13 {
            width: 54.16667%
        }

        .el-col-offset-13 {
            margin-left: 54.16667%
        }

        .el-col-pull-13 {
            right: 54.16667%
        }

        .el-col-push-13 {
            left: 54.16667%
        }

        .el-col-14 {
            width: 58.33333%
        }

        .el-col-offset-14 {
            margin-left: 58.33333%
        }

        .el-col-pull-14 {
            right: 58.33333%
        }

        .el-col-push-14 {
            left: 58.33333%
        }

        .el-col-15 {
            width: 62.5%
        }

        .el-col-offset-15 {
            margin-left: 62.5%
        }

        .el-col-pull-15 {
            right: 62.5%
        }

        .el-col-push-15 {
            left: 62.5%
        }

        .el-col-16 {
            width: 66.66667%
        }

        .el-col-offset-16 {
            margin-left: 66.66667%
        }

        .el-col-pull-16 {
            right: 66.66667%
        }

        .el-col-push-16 {
            left: 66.66667%
        }

        .el-col-17 {
            width: 70.83333%
        }

        .el-col-offset-17 {
            margin-left: 70.83333%
        }

        .el-col-pull-17 {
            right: 70.83333%
        }

        .el-col-push-17 {
            left: 70.83333%
        }

        .el-col-18 {
            width: 75%
        }

        .el-col-offset-18 {
            margin-left: 75%
        }

        .el-col-pull-18 {
            right: 75%
        }

        .el-col-push-18 {
            left: 75%
        }

        .el-col-19 {
            width: 79.16667%
        }

        .el-col-offset-19 {
            margin-left: 79.16667%
        }

        .el-col-pull-19 {
            right: 79.16667%
        }

        .el-col-push-19 {
            left: 79.16667%
        }

        .el-col-20 {
            width: 83.33333%
        }

        .el-col-offset-20 {
            margin-left: 83.33333%
        }

        .el-col-pull-20 {
            right: 83.33333%
        }

        .el-col-push-20 {
            left: 83.33333%
        }

        .el-col-21 {
            width: 87.5%
        }

        .el-col-offset-21 {
            margin-left: 87.5%
        }

        .el-col-pull-21 {
            right: 87.5%
        }

        .el-col-push-21 {
            left: 87.5%
        }

        .el-col-22 {
            width: 91.66667%
        }

        .el-col-offset-22 {
            margin-left: 91.66667%
        }

        .el-col-pull-22 {
            right: 91.66667%
        }

        .el-col-push-22 {
            left: 91.66667%
        }

        .el-col-23 {
            width: 95.83333%
        }

        .el-col-offset-23 {
            margin-left: 95.83333%
        }

        .el-col-pull-23 {
            right: 95.83333%
        }

        .el-col-push-23 {
            left: 95.83333%
        }

        .el-col-24 {
            width: 100%
        }

        .el-col-offset-24 {
            margin-left: 100%
        }

        .el-col-pull-24 {
            right: 100%
        }

        .el-col-push-24 {
            left: 100%
        }

        @media only screen and (max-width:767px) {
            .el-col-xs-0 {
                display: none;
                width: 0
            }

            .el-col-xs-offset-0 {
                margin-left: 0
            }

            .el-col-xs-pull-0 {
                position: relative;
                right: 0
            }

            .el-col-xs-push-0 {
                position: relative;
                left: 0
            }

            .el-col-xs-1 {
                width: 4.16667%
            }

            .el-col-xs-offset-1 {
                margin-left: 4.16667%
            }

            .el-col-xs-pull-1 {
                position: relative;
                right: 4.16667%
            }

            .el-col-xs-push-1 {
                position: relative;
                left: 4.16667%
            }

            .el-col-xs-2 {
                width: 8.33333%
            }

            .el-col-xs-offset-2 {
                margin-left: 8.33333%
            }

            .el-col-xs-pull-2 {
                position: relative;
                right: 8.33333%
            }

            .el-col-xs-push-2 {
                position: relative;
                left: 8.33333%
            }

            .el-col-xs-3 {
                width: 12.5%
            }

            .el-col-xs-offset-3 {
                margin-left: 12.5%
            }

            .el-col-xs-pull-3 {
                position: relative;
                right: 12.5%
            }

            .el-col-xs-push-3 {
                position: relative;
                left: 12.5%
            }

            .el-col-xs-4 {
                width: 16.66667%
            }

            .el-col-xs-offset-4 {
                margin-left: 16.66667%
            }

            .el-col-xs-pull-4 {
                position: relative;
                right: 16.66667%
            }

            .el-col-xs-push-4 {
                position: relative;
                left: 16.66667%
            }

            .el-col-xs-5 {
                width: 20.83333%
            }

            .el-col-xs-offset-5 {
                margin-left: 20.83333%
            }

            .el-col-xs-pull-5 {
                position: relative;
                right: 20.83333%
            }

            .el-col-xs-push-5 {
                position: relative;
                left: 20.83333%
            }

            .el-col-xs-6 {
                width: 25%
            }

            .el-col-xs-offset-6 {
                margin-left: 25%
            }

            .el-col-xs-pull-6 {
                position: relative;
                right: 25%
            }

            .el-col-xs-push-6 {
                position: relative;
                left: 25%
            }

            .el-col-xs-7 {
                width: 29.16667%
            }

            .el-col-xs-offset-7 {
                margin-left: 29.16667%
            }

            .el-col-xs-pull-7 {
                position: relative;
                right: 29.16667%
            }

            .el-col-xs-push-7 {
                position: relative;
                left: 29.16667%
            }

            .el-col-xs-8 {
                width: 33.33333%
            }

            .el-col-xs-offset-8 {
                margin-left: 33.33333%
            }

            .el-col-xs-pull-8 {
                position: relative;
                right: 33.33333%
            }

            .el-col-xs-push-8 {
                position: relative;
                left: 33.33333%
            }

            .el-col-xs-9 {
                width: 37.5%
            }

            .el-col-xs-offset-9 {
                margin-left: 37.5%
            }

            .el-col-xs-pull-9 {
                position: relative;
                right: 37.5%
            }

            .el-col-xs-push-9 {
                position: relative;
                left: 37.5%
            }

            .el-col-xs-10 {
                width: 41.66667%
            }

            .el-col-xs-offset-10 {
                margin-left: 41.66667%
            }

            .el-col-xs-pull-10 {
                position: relative;
                right: 41.66667%
            }

            .el-col-xs-push-10 {
                position: relative;
                left: 41.66667%
            }

            .el-col-xs-11 {
                width: 45.83333%
            }

            .el-col-xs-offset-11 {
                margin-left: 45.83333%
            }

            .el-col-xs-pull-11 {
                position: relative;
                right: 45.83333%
            }

            .el-col-xs-push-11 {
                position: relative;
                left: 45.83333%
            }

            .el-col-xs-12 {
                width: 50%
            }

            .el-col-xs-offset-12 {
                margin-left: 50%
            }

            .el-col-xs-pull-12 {
                position: relative;
                right: 50%
            }

            .el-col-xs-push-12 {
                position: relative;
                left: 50%
            }

            .el-col-xs-13 {
                width: 54.16667%
            }

            .el-col-xs-offset-13 {
                margin-left: 54.16667%
            }

            .el-col-xs-pull-13 {
                position: relative;
                right: 54.16667%
            }

            .el-col-xs-push-13 {
                position: relative;
                left: 54.16667%
            }

            .el-col-xs-14 {
                width: 58.33333%
            }

            .el-col-xs-offset-14 {
                margin-left: 58.33333%
            }

            .el-col-xs-pull-14 {
                position: relative;
                right: 58.33333%
            }

            .el-col-xs-push-14 {
                position: relative;
                left: 58.33333%
            }

            .el-col-xs-15 {
                width: 62.5%
            }

            .el-col-xs-offset-15 {
                margin-left: 62.5%
            }

            .el-col-xs-pull-15 {
                position: relative;
                right: 62.5%
            }

            .el-col-xs-push-15 {
                position: relative;
                left: 62.5%
            }

            .el-col-xs-16 {
                width: 66.66667%
            }

            .el-col-xs-offset-16 {
                margin-left: 66.66667%
            }

            .el-col-xs-pull-16 {
                position: relative;
                right: 66.66667%
            }

            .el-col-xs-push-16 {
                position: relative;
                left: 66.66667%
            }

            .el-col-xs-17 {
                width: 70.83333%
            }

            .el-col-xs-offset-17 {
                margin-left: 70.83333%
            }

            .el-col-xs-pull-17 {
                position: relative;
                right: 70.83333%
            }

            .el-col-xs-push-17 {
                position: relative;
                left: 70.83333%
            }

            .el-col-xs-18 {
                width: 75%
            }

            .el-col-xs-offset-18 {
                margin-left: 75%
            }

            .el-col-xs-pull-18 {
                position: relative;
                right: 75%
            }

            .el-col-xs-push-18 {
                position: relative;
                left: 75%
            }

            .el-col-xs-19 {
                width: 79.16667%
            }

            .el-col-xs-offset-19 {
                margin-left: 79.16667%
            }

            .el-col-xs-pull-19 {
                position: relative;
                right: 79.16667%
            }

            .el-col-xs-push-19 {
                position: relative;
                left: 79.16667%
            }

            .el-col-xs-20 {
                width: 83.33333%
            }

            .el-col-xs-offset-20 {
                margin-left: 83.33333%
            }

            .el-col-xs-pull-20 {
                position: relative;
                right: 83.33333%
            }

            .el-col-xs-push-20 {
                position: relative;
                left: 83.33333%
            }

            .el-col-xs-21 {
                width: 87.5%
            }

            .el-col-xs-offset-21 {
                margin-left: 87.5%
            }

            .el-col-xs-pull-21 {
                position: relative;
                right: 87.5%
            }

            .el-col-xs-push-21 {
                position: relative;
                left: 87.5%
            }

            .el-col-xs-22 {
                width: 91.66667%
            }

            .el-col-xs-offset-22 {
                margin-left: 91.66667%
            }

            .el-col-xs-pull-22 {
                position: relative;
                right: 91.66667%
            }

            .el-col-xs-push-22 {
                position: relative;
                left: 91.66667%
            }

            .el-col-xs-23 {
                width: 95.83333%
            }

            .el-col-xs-offset-23 {
                margin-left: 95.83333%
            }

            .el-col-xs-pull-23 {
                position: relative;
                right: 95.83333%
            }

            .el-col-xs-push-23 {
                position: relative;
                left: 95.83333%
            }

            .el-col-xs-24 {
                width: 100%
            }

            .el-col-xs-offset-24 {
                margin-left: 100%
            }

            .el-col-xs-pull-24 {
                position: relative;
                right: 100%
            }

            .el-col-xs-push-24 {
                position: relative;
                left: 100%
            }
        }

        @media only screen and (min-width:768px) {
            .el-col-sm-0 {
                display: none;
                width: 0
            }

            .el-col-sm-offset-0 {
                margin-left: 0
            }

            .el-col-sm-pull-0 {
                position: relative;
                right: 0
            }

            .el-col-sm-push-0 {
                position: relative;
                left: 0
            }

            .el-col-sm-1 {
                width: 4.16667%
            }

            .el-col-sm-offset-1 {
                margin-left: 4.16667%
            }

            .el-col-sm-pull-1 {
                position: relative;
                right: 4.16667%
            }

            .el-col-sm-push-1 {
                position: relative;
                left: 4.16667%
            }

            .el-col-sm-2 {
                width: 8.33333%
            }

            .el-col-sm-offset-2 {
                margin-left: 8.33333%
            }

            .el-col-sm-pull-2 {
                position: relative;
                right: 8.33333%
            }

            .el-col-sm-push-2 {
                position: relative;
                left: 8.33333%
            }

            .el-col-sm-3 {
                width: 12.5%
            }

            .el-col-sm-offset-3 {
                margin-left: 12.5%
            }

            .el-col-sm-pull-3 {
                position: relative;
                right: 12.5%
            }

            .el-col-sm-push-3 {
                position: relative;
                left: 12.5%
            }

            .el-col-sm-4 {
                width: 16.66667%
            }

            .el-col-sm-offset-4 {
                margin-left: 16.66667%
            }

            .el-col-sm-pull-4 {
                position: relative;
                right: 16.66667%
            }

            .el-col-sm-push-4 {
                position: relative;
                left: 16.66667%
            }

            .el-col-sm-5 {
                width: 20.83333%
            }

            .el-col-sm-offset-5 {
                margin-left: 20.83333%
            }

            .el-col-sm-pull-5 {
                position: relative;
                right: 20.83333%
            }

            .el-col-sm-push-5 {
                position: relative;
                left: 20.83333%
            }

            .el-col-sm-6 {
                width: 25%
            }

            .el-col-sm-offset-6 {
                margin-left: 25%
            }

            .el-col-sm-pull-6 {
                position: relative;
                right: 25%
            }

            .el-col-sm-push-6 {
                position: relative;
                left: 25%
            }

            .el-col-sm-7 {
                width: 29.16667%
            }

            .el-col-sm-offset-7 {
                margin-left: 29.16667%
            }

            .el-col-sm-pull-7 {
                position: relative;
                right: 29.16667%
            }

            .el-col-sm-push-7 {
                position: relative;
                left: 29.16667%
            }

            .el-col-sm-8 {
                width: 33.33333%
            }

            .el-col-sm-offset-8 {
                margin-left: 33.33333%
            }

            .el-col-sm-pull-8 {
                position: relative;
                right: 33.33333%
            }

            .el-col-sm-push-8 {
                position: relative;
                left: 33.33333%
            }

            .el-col-sm-9 {
                width: 37.5%
            }

            .el-col-sm-offset-9 {
                margin-left: 37.5%
            }

            .el-col-sm-pull-9 {
                position: relative;
                right: 37.5%
            }

            .el-col-sm-push-9 {
                position: relative;
                left: 37.5%
            }

            .el-col-sm-10 {
                width: 41.66667%
            }

            .el-col-sm-offset-10 {
                margin-left: 41.66667%
            }

            .el-col-sm-pull-10 {
                position: relative;
                right: 41.66667%
            }

            .el-col-sm-push-10 {
                position: relative;
                left: 41.66667%
            }

            .el-col-sm-11 {
                width: 45.83333%
            }

            .el-col-sm-offset-11 {
                margin-left: 45.83333%
            }

            .el-col-sm-pull-11 {
                position: relative;
                right: 45.83333%
            }

            .el-col-sm-push-11 {
                position: relative;
                left: 45.83333%
            }

            .el-col-sm-12 {
                width: 50%
            }

            .el-col-sm-offset-12 {
                margin-left: 50%
            }

            .el-col-sm-pull-12 {
                position: relative;
                right: 50%
            }

            .el-col-sm-push-12 {
                position: relative;
                left: 50%
            }

            .el-col-sm-13 {
                width: 54.16667%
            }

            .el-col-sm-offset-13 {
                margin-left: 54.16667%
            }

            .el-col-sm-pull-13 {
                position: relative;
                right: 54.16667%
            }

            .el-col-sm-push-13 {
                position: relative;
                left: 54.16667%
            }

            .el-col-sm-14 {
                width: 58.33333%
            }

            .el-col-sm-offset-14 {
                margin-left: 58.33333%
            }

            .el-col-sm-pull-14 {
                position: relative;
                right: 58.33333%
            }

            .el-col-sm-push-14 {
                position: relative;
                left: 58.33333%
            }

            .el-col-sm-15 {
                width: 62.5%
            }

            .el-col-sm-offset-15 {
                margin-left: 62.5%
            }

            .el-col-sm-pull-15 {
                position: relative;
                right: 62.5%
            }

            .el-col-sm-push-15 {
                position: relative;
                left: 62.5%
            }

            .el-col-sm-16 {
                width: 66.66667%
            }

            .el-col-sm-offset-16 {
                margin-left: 66.66667%
            }

            .el-col-sm-pull-16 {
                position: relative;
                right: 66.66667%
            }

            .el-col-sm-push-16 {
                position: relative;
                left: 66.66667%
            }

            .el-col-sm-17 {
                width: 70.83333%
            }

            .el-col-sm-offset-17 {
                margin-left: 70.83333%
            }

            .el-col-sm-pull-17 {
                position: relative;
                right: 70.83333%
            }

            .el-col-sm-push-17 {
                position: relative;
                left: 70.83333%
            }

            .el-col-sm-18 {
                width: 75%
            }

            .el-col-sm-offset-18 {
                margin-left: 75%
            }

            .el-col-sm-pull-18 {
                position: relative;
                right: 75%
            }

            .el-col-sm-push-18 {
                position: relative;
                left: 75%
            }

            .el-col-sm-19 {
                width: 79.16667%
            }

            .el-col-sm-offset-19 {
                margin-left: 79.16667%
            }

            .el-col-sm-pull-19 {
                position: relative;
                right: 79.16667%
            }

            .el-col-sm-push-19 {
                position: relative;
                left: 79.16667%
            }

            .el-col-sm-20 {
                width: 83.33333%
            }

            .el-col-sm-offset-20 {
                margin-left: 83.33333%
            }

            .el-col-sm-pull-20 {
                position: relative;
                right: 83.33333%
            }

            .el-col-sm-push-20 {
                position: relative;
                left: 83.33333%
            }

            .el-col-sm-21 {
                width: 87.5%
            }

            .el-col-sm-offset-21 {
                margin-left: 87.5%
            }

            .el-col-sm-pull-21 {
                position: relative;
                right: 87.5%
            }

            .el-col-sm-push-21 {
                position: relative;
                left: 87.5%
            }

            .el-col-sm-22 {
                width: 91.66667%
            }

            .el-col-sm-offset-22 {
                margin-left: 91.66667%
            }

            .el-col-sm-pull-22 {
                position: relative;
                right: 91.66667%
            }

            .el-col-sm-push-22 {
                position: relative;
                left: 91.66667%
            }

            .el-col-sm-23 {
                width: 95.83333%
            }

            .el-col-sm-offset-23 {
                margin-left: 95.83333%
            }

            .el-col-sm-pull-23 {
                position: relative;
                right: 95.83333%
            }

            .el-col-sm-push-23 {
                position: relative;
                left: 95.83333%
            }

            .el-col-sm-24 {
                width: 100%
            }

            .el-col-sm-offset-24 {
                margin-left: 100%
            }

            .el-col-sm-pull-24 {
                position: relative;
                right: 100%
            }

            .el-col-sm-push-24 {
                position: relative;
                left: 100%
            }
        }

        @media only screen and (min-width:992px) {
            .el-col-md-0 {
                display: none;
                width: 0
            }

            .el-col-md-offset-0 {
                margin-left: 0
            }

            .el-col-md-pull-0 {
                position: relative;
                right: 0
            }

            .el-col-md-push-0 {
                position: relative;
                left: 0
            }

            .el-col-md-1 {
                width: 4.16667%
            }

            .el-col-md-offset-1 {
                margin-left: 4.16667%
            }

            .el-col-md-pull-1 {
                position: relative;
                right: 4.16667%
            }

            .el-col-md-push-1 {
                position: relative;
                left: 4.16667%
            }

            .el-col-md-2 {
                width: 8.33333%
            }

            .el-col-md-offset-2 {
                margin-left: 8.33333%
            }

            .el-col-md-pull-2 {
                position: relative;
                right: 8.33333%
            }

            .el-col-md-push-2 {
                position: relative;
                left: 8.33333%
            }

            .el-col-md-3 {
                width: 12.5%
            }

            .el-col-md-offset-3 {
                margin-left: 12.5%
            }

            .el-col-md-pull-3 {
                position: relative;
                right: 12.5%
            }

            .el-col-md-push-3 {
                position: relative;
                left: 12.5%
            }

            .el-col-md-4 {
                width: 16.66667%
            }

            .el-col-md-offset-4 {
                margin-left: 16.66667%
            }

            .el-col-md-pull-4 {
                position: relative;
                right: 16.66667%
            }

            .el-col-md-push-4 {
                position: relative;
                left: 16.66667%
            }

            .el-col-md-5 {
                width: 20.83333%
            }

            .el-col-md-offset-5 {
                margin-left: 20.83333%
            }

            .el-col-md-pull-5 {
                position: relative;
                right: 20.83333%
            }

            .el-col-md-push-5 {
                position: relative;
                left: 20.83333%
            }

            .el-col-md-6 {
                width: 25%
            }

            .el-col-md-offset-6 {
                margin-left: 25%
            }

            .el-col-md-pull-6 {
                position: relative;
                right: 25%
            }

            .el-col-md-push-6 {
                position: relative;
                left: 25%
            }

            .el-col-md-7 {
                width: 29.16667%
            }

            .el-col-md-offset-7 {
                margin-left: 29.16667%
            }

            .el-col-md-pull-7 {
                position: relative;
                right: 29.16667%
            }

            .el-col-md-push-7 {
                position: relative;
                left: 29.16667%
            }

            .el-col-md-8 {
                width: 33.33333%
            }

            .el-col-md-offset-8 {
                margin-left: 33.33333%
            }

            .el-col-md-pull-8 {
                position: relative;
                right: 33.33333%
            }

            .el-col-md-push-8 {
                position: relative;
                left: 33.33333%
            }

            .el-col-md-9 {
                width: 37.5%
            }

            .el-col-md-offset-9 {
                margin-left: 37.5%
            }

            .el-col-md-pull-9 {
                position: relative;
                right: 37.5%
            }

            .el-col-md-push-9 {
                position: relative;
                left: 37.5%
            }

            .el-col-md-10 {
                width: 41.66667%
            }

            .el-col-md-offset-10 {
                margin-left: 41.66667%
            }

            .el-col-md-pull-10 {
                position: relative;
                right: 41.66667%
            }

            .el-col-md-push-10 {
                position: relative;
                left: 41.66667%
            }

            .el-col-md-11 {
                width: 45.83333%
            }

            .el-col-md-offset-11 {
                margin-left: 45.83333%
            }

            .el-col-md-pull-11 {
                position: relative;
                right: 45.83333%
            }

            .el-col-md-push-11 {
                position: relative;
                left: 45.83333%
            }

            .el-col-md-12 {
                width: 50%
            }

            .el-col-md-offset-12 {
                margin-left: 50%
            }

            .el-col-md-pull-12 {
                position: relative;
                right: 50%
            }

            .el-col-md-push-12 {
                position: relative;
                left: 50%
            }

            .el-col-md-13 {
                width: 54.16667%
            }

            .el-col-md-offset-13 {
                margin-left: 54.16667%
            }

            .el-col-md-pull-13 {
                position: relative;
                right: 54.16667%
            }

            .el-col-md-push-13 {
                position: relative;
                left: 54.16667%
            }

            .el-col-md-14 {
                width: 58.33333%
            }

            .el-col-md-offset-14 {
                margin-left: 58.33333%
            }

            .el-col-md-pull-14 {
                position: relative;
                right: 58.33333%
            }

            .el-col-md-push-14 {
                position: relative;
                left: 58.33333%
            }

            .el-col-md-15 {
                width: 62.5%
            }

            .el-col-md-offset-15 {
                margin-left: 62.5%
            }

            .el-col-md-pull-15 {
                position: relative;
                right: 62.5%
            }

            .el-col-md-push-15 {
                position: relative;
                left: 62.5%
            }

            .el-col-md-16 {
                width: 66.66667%
            }

            .el-col-md-offset-16 {
                margin-left: 66.66667%
            }

            .el-col-md-pull-16 {
                position: relative;
                right: 66.66667%
            }

            .el-col-md-push-16 {
                position: relative;
                left: 66.66667%
            }

            .el-col-md-17 {
                width: 70.83333%
            }

            .el-col-md-offset-17 {
                margin-left: 70.83333%
            }

            .el-col-md-pull-17 {
                position: relative;
                right: 70.83333%
            }

            .el-col-md-push-17 {
                position: relative;
                left: 70.83333%
            }

            .el-col-md-18 {
                width: 75%
            }

            .el-col-md-offset-18 {
                margin-left: 75%
            }

            .el-col-md-pull-18 {
                position: relative;
                right: 75%
            }

            .el-col-md-push-18 {
                position: relative;
                left: 75%
            }

            .el-col-md-19 {
                width: 79.16667%
            }

            .el-col-md-offset-19 {
                margin-left: 79.16667%
            }

            .el-col-md-pull-19 {
                position: relative;
                right: 79.16667%
            }

            .el-col-md-push-19 {
                position: relative;
                left: 79.16667%
            }

            .el-col-md-20 {
                width: 83.33333%
            }

            .el-col-md-offset-20 {
                margin-left: 83.33333%
            }

            .el-col-md-pull-20 {
                position: relative;
                right: 83.33333%
            }

            .el-col-md-push-20 {
                position: relative;
                left: 83.33333%
            }

            .el-col-md-21 {
                width: 87.5%
            }

            .el-col-md-offset-21 {
                margin-left: 87.5%
            }

            .el-col-md-pull-21 {
                position: relative;
                right: 87.5%
            }

            .el-col-md-push-21 {
                position: relative;
                left: 87.5%
            }

            .el-col-md-22 {
                width: 91.66667%
            }

            .el-col-md-offset-22 {
                margin-left: 91.66667%
            }

            .el-col-md-pull-22 {
                position: relative;
                right: 91.66667%
            }

            .el-col-md-push-22 {
                position: relative;
                left: 91.66667%
            }

            .el-col-md-23 {
                width: 95.83333%
            }

            .el-col-md-offset-23 {
                margin-left: 95.83333%
            }

            .el-col-md-pull-23 {
                position: relative;
                right: 95.83333%
            }

            .el-col-md-push-23 {
                position: relative;
                left: 95.83333%
            }

            .el-col-md-24 {
                width: 100%
            }

            .el-col-md-offset-24 {
                margin-left: 100%
            }

            .el-col-md-pull-24 {
                position: relative;
                right: 100%
            }

            .el-col-md-push-24 {
                position: relative;
                left: 100%
            }
        }

        @media only screen and (min-width:1200px) {
            .el-col-lg-0 {
                display: none;
                width: 0
            }

            .el-col-lg-offset-0 {
                margin-left: 0
            }

            .el-col-lg-pull-0 {
                position: relative;
                right: 0
            }

            .el-col-lg-push-0 {
                position: relative;
                left: 0
            }

            .el-col-lg-1 {
                width: 4.16667%
            }

            .el-col-lg-offset-1 {
                margin-left: 4.16667%
            }

            .el-col-lg-pull-1 {
                position: relative;
                right: 4.16667%
            }

            .el-col-lg-push-1 {
                position: relative;
                left: 4.16667%
            }

            .el-col-lg-2 {
                width: 8.33333%
            }

            .el-col-lg-offset-2 {
                margin-left: 8.33333%
            }

            .el-col-lg-pull-2 {
                position: relative;
                right: 8.33333%
            }

            .el-col-lg-push-2 {
                position: relative;
                left: 8.33333%
            }

            .el-col-lg-3 {
                width: 12.5%
            }

            .el-col-lg-offset-3 {
                margin-left: 12.5%
            }

            .el-col-lg-pull-3 {
                position: relative;
                right: 12.5%
            }

            .el-col-lg-push-3 {
                position: relative;
                left: 12.5%
            }

            .el-col-lg-4 {
                width: 16.66667%
            }

            .el-col-lg-offset-4 {
                margin-left: 16.66667%
            }

            .el-col-lg-pull-4 {
                position: relative;
                right: 16.66667%
            }

            .el-col-lg-push-4 {
                position: relative;
                left: 16.66667%
            }

            .el-col-lg-5 {
                width: 20.83333%
            }

            .el-col-lg-offset-5 {
                margin-left: 20.83333%
            }

            .el-col-lg-pull-5 {
                position: relative;
                right: 20.83333%
            }

            .el-col-lg-push-5 {
                position: relative;
                left: 20.83333%
            }

            .el-col-lg-6 {
                width: 25%
            }

            .el-col-lg-offset-6 {
                margin-left: 25%
            }

            .el-col-lg-pull-6 {
                position: relative;
                right: 25%
            }

            .el-col-lg-push-6 {
                position: relative;
                left: 25%
            }

            .el-col-lg-7 {
                width: 29.16667%
            }

            .el-col-lg-offset-7 {
                margin-left: 29.16667%
            }

            .el-col-lg-pull-7 {
                position: relative;
                right: 29.16667%
            }

            .el-col-lg-push-7 {
                position: relative;
                left: 29.16667%
            }

            .el-col-lg-8 {
                width: 33.33333%
            }

            .el-col-lg-offset-8 {
                margin-left: 33.33333%
            }

            .el-col-lg-pull-8 {
                position: relative;
                right: 33.33333%
            }

            .el-col-lg-push-8 {
                position: relative;
                left: 33.33333%
            }

            .el-col-lg-9 {
                width: 37.5%
            }

            .el-col-lg-offset-9 {
                margin-left: 37.5%
            }

            .el-col-lg-pull-9 {
                position: relative;
                right: 37.5%
            }

            .el-col-lg-push-9 {
                position: relative;
                left: 37.5%
            }

            .el-col-lg-10 {
                width: 41.66667%
            }

            .el-col-lg-offset-10 {
                margin-left: 41.66667%
            }

            .el-col-lg-pull-10 {
                position: relative;
                right: 41.66667%
            }

            .el-col-lg-push-10 {
                position: relative;
                left: 41.66667%
            }

            .el-col-lg-11 {
                width: 45.83333%
            }

            .el-col-lg-offset-11 {
                margin-left: 45.83333%
            }

            .el-col-lg-pull-11 {
                position: relative;
                right: 45.83333%
            }

            .el-col-lg-push-11 {
                position: relative;
                left: 45.83333%
            }

            .el-col-lg-12 {
                width: 50%
            }

            .el-col-lg-offset-12 {
                margin-left: 50%
            }

            .el-col-lg-pull-12 {
                position: relative;
                right: 50%
            }

            .el-col-lg-push-12 {
                position: relative;
                left: 50%
            }

            .el-col-lg-13 {
                width: 54.16667%
            }

            .el-col-lg-offset-13 {
                margin-left: 54.16667%
            }

            .el-col-lg-pull-13 {
                position: relative;
                right: 54.16667%
            }

            .el-col-lg-push-13 {
                position: relative;
                left: 54.16667%
            }

            .el-col-lg-14 {
                width: 58.33333%
            }

            .el-col-lg-offset-14 {
                margin-left: 58.33333%
            }

            .el-col-lg-pull-14 {
                position: relative;
                right: 58.33333%
            }

            .el-col-lg-push-14 {
                position: relative;
                left: 58.33333%
            }

            .el-col-lg-15 {
                width: 62.5%
            }

            .el-col-lg-offset-15 {
                margin-left: 62.5%
            }

            .el-col-lg-pull-15 {
                position: relative;
                right: 62.5%
            }

            .el-col-lg-push-15 {
                position: relative;
                left: 62.5%
            }

            .el-col-lg-16 {
                width: 66.66667%
            }

            .el-col-lg-offset-16 {
                margin-left: 66.66667%
            }

            .el-col-lg-pull-16 {
                position: relative;
                right: 66.66667%
            }

            .el-col-lg-push-16 {
                position: relative;
                left: 66.66667%
            }

            .el-col-lg-17 {
                width: 70.83333%
            }

            .el-col-lg-offset-17 {
                margin-left: 70.83333%
            }

            .el-col-lg-pull-17 {
                position: relative;
                right: 70.83333%
            }

            .el-col-lg-push-17 {
                position: relative;
                left: 70.83333%
            }

            .el-col-lg-18 {
                width: 75%
            }

            .el-col-lg-offset-18 {
                margin-left: 75%
            }

            .el-col-lg-pull-18 {
                position: relative;
                right: 75%
            }

            .el-col-lg-push-18 {
                position: relative;
                left: 75%
            }

            .el-col-lg-19 {
                width: 79.16667%
            }

            .el-col-lg-offset-19 {
                margin-left: 79.16667%
            }

            .el-col-lg-pull-19 {
                position: relative;
                right: 79.16667%
            }

            .el-col-lg-push-19 {
                position: relative;
                left: 79.16667%
            }

            .el-col-lg-20 {
                width: 83.33333%
            }

            .el-col-lg-offset-20 {
                margin-left: 83.33333%
            }

            .el-col-lg-pull-20 {
                position: relative;
                right: 83.33333%
            }

            .el-col-lg-push-20 {
                position: relative;
                left: 83.33333%
            }

            .el-col-lg-21 {
                width: 87.5%
            }

            .el-col-lg-offset-21 {
                margin-left: 87.5%
            }

            .el-col-lg-pull-21 {
                position: relative;
                right: 87.5%
            }

            .el-col-lg-push-21 {
                position: relative;
                left: 87.5%
            }

            .el-col-lg-22 {
                width: 91.66667%
            }

            .el-col-lg-offset-22 {
                margin-left: 91.66667%
            }

            .el-col-lg-pull-22 {
                position: relative;
                right: 91.66667%
            }

            .el-col-lg-push-22 {
                position: relative;
                left: 91.66667%
            }

            .el-col-lg-23 {
                width: 95.83333%
            }

            .el-col-lg-offset-23 {
                margin-left: 95.83333%
            }

            .el-col-lg-pull-23 {
                position: relative;
                right: 95.83333%
            }

            .el-col-lg-push-23 {
                position: relative;
                left: 95.83333%
            }

            .el-col-lg-24 {
                width: 100%
            }

            .el-col-lg-offset-24 {
                margin-left: 100%
            }

            .el-col-lg-pull-24 {
                position: relative;
                right: 100%
            }

            .el-col-lg-push-24 {
                position: relative;
                left: 100%
            }
        }

        @media only screen and (min-width:1920px) {
            .el-col-xl-0 {
                display: none;
                width: 0
            }

            .el-col-xl-offset-0 {
                margin-left: 0
            }

            .el-col-xl-pull-0 {
                position: relative;
                right: 0
            }

            .el-col-xl-push-0 {
                position: relative;
                left: 0
            }

            .el-col-xl-1 {
                width: 4.16667%
            }

            .el-col-xl-offset-1 {
                margin-left: 4.16667%
            }

            .el-col-xl-pull-1 {
                position: relative;
                right: 4.16667%
            }

            .el-col-xl-push-1 {
                position: relative;
                left: 4.16667%
            }

            .el-col-xl-2 {
                width: 8.33333%
            }

            .el-col-xl-offset-2 {
                margin-left: 8.33333%
            }

            .el-col-xl-pull-2 {
                position: relative;
                right: 8.33333%
            }

            .el-col-xl-push-2 {
                position: relative;
                left: 8.33333%
            }

            .el-col-xl-3 {
                width: 12.5%
            }

            .el-col-xl-offset-3 {
                margin-left: 12.5%
            }

            .el-col-xl-pull-3 {
                position: relative;
                right: 12.5%
            }

            .el-col-xl-push-3 {
                position: relative;
                left: 12.5%
            }

            .el-col-xl-4 {
                width: 16.66667%
            }

            .el-col-xl-offset-4 {
                margin-left: 16.66667%
            }

            .el-col-xl-pull-4 {
                position: relative;
                right: 16.66667%
            }

            .el-col-xl-push-4 {
                position: relative;
                left: 16.66667%
            }

            .el-col-xl-5 {
                width: 20.83333%
            }

            .el-col-xl-offset-5 {
                margin-left: 20.83333%
            }

            .el-col-xl-pull-5 {
                position: relative;
                right: 20.83333%
            }

            .el-col-xl-push-5 {
                position: relative;
                left: 20.83333%
            }

            .el-col-xl-6 {
                width: 25%
            }

            .el-col-xl-offset-6 {
                margin-left: 25%
            }

            .el-col-xl-pull-6 {
                position: relative;
                right: 25%
            }

            .el-col-xl-push-6 {
                position: relative;
                left: 25%
            }

            .el-col-xl-7 {
                width: 29.16667%
            }

            .el-col-xl-offset-7 {
                margin-left: 29.16667%
            }

            .el-col-xl-pull-7 {
                position: relative;
                right: 29.16667%
            }

            .el-col-xl-push-7 {
                position: relative;
                left: 29.16667%
            }

            .el-col-xl-8 {
                width: 33.33333%
            }

            .el-col-xl-offset-8 {
                margin-left: 33.33333%
            }

            .el-col-xl-pull-8 {
                position: relative;
                right: 33.33333%
            }

            .el-col-xl-push-8 {
                position: relative;
                left: 33.33333%
            }

            .el-col-xl-9 {
                width: 37.5%
            }

            .el-col-xl-offset-9 {
                margin-left: 37.5%
            }

            .el-col-xl-pull-9 {
                position: relative;
                right: 37.5%
            }

            .el-col-xl-push-9 {
                position: relative;
                left: 37.5%
            }

            .el-col-xl-10 {
                width: 41.66667%
            }

            .el-col-xl-offset-10 {
                margin-left: 41.66667%
            }

            .el-col-xl-pull-10 {
                position: relative;
                right: 41.66667%
            }

            .el-col-xl-push-10 {
                position: relative;
                left: 41.66667%
            }

            .el-col-xl-11 {
                width: 45.83333%
            }

            .el-col-xl-offset-11 {
                margin-left: 45.83333%
            }

            .el-col-xl-pull-11 {
                position: relative;
                right: 45.83333%
            }

            .el-col-xl-push-11 {
                position: relative;
                left: 45.83333%
            }

            .el-col-xl-12 {
                width: 50%
            }

            .el-col-xl-offset-12 {
                margin-left: 50%
            }

            .el-col-xl-pull-12 {
                position: relative;
                right: 50%
            }

            .el-col-xl-push-12 {
                position: relative;
                left: 50%
            }

            .el-col-xl-13 {
                width: 54.16667%
            }

            .el-col-xl-offset-13 {
                margin-left: 54.16667%
            }

            .el-col-xl-pull-13 {
                position: relative;
                right: 54.16667%
            }

            .el-col-xl-push-13 {
                position: relative;
                left: 54.16667%
            }

            .el-col-xl-14 {
                width: 58.33333%
            }

            .el-col-xl-offset-14 {
                margin-left: 58.33333%
            }

            .el-col-xl-pull-14 {
                position: relative;
                right: 58.33333%
            }

            .el-col-xl-push-14 {
                position: relative;
                left: 58.33333%
            }

            .el-col-xl-15 {
                width: 62.5%
            }

            .el-col-xl-offset-15 {
                margin-left: 62.5%
            }

            .el-col-xl-pull-15 {
                position: relative;
                right: 62.5%
            }

            .el-col-xl-push-15 {
                position: relative;
                left: 62.5%
            }

            .el-col-xl-16 {
                width: 66.66667%
            }

            .el-col-xl-offset-16 {
                margin-left: 66.66667%
            }

            .el-col-xl-pull-16 {
                position: relative;
                right: 66.66667%
            }

            .el-col-xl-push-16 {
                position: relative;
                left: 66.66667%
            }

            .el-col-xl-17 {
                width: 70.83333%
            }

            .el-col-xl-offset-17 {
                margin-left: 70.83333%
            }

            .el-col-xl-pull-17 {
                position: relative;
                right: 70.83333%
            }

            .el-col-xl-push-17 {
                position: relative;
                left: 70.83333%
            }

            .el-col-xl-18 {
                width: 75%
            }

            .el-col-xl-offset-18 {
                margin-left: 75%
            }

            .el-col-xl-pull-18 {
                position: relative;
                right: 75%
            }

            .el-col-xl-push-18 {
                position: relative;
                left: 75%
            }

            .el-col-xl-19 {
                width: 79.16667%
            }

            .el-col-xl-offset-19 {
                margin-left: 79.16667%
            }

            .el-col-xl-pull-19 {
                position: relative;
                right: 79.16667%
            }

            .el-col-xl-push-19 {
                position: relative;
                left: 79.16667%
            }

            .el-col-xl-20 {
                width: 83.33333%
            }

            .el-col-xl-offset-20 {
                margin-left: 83.33333%
            }

            .el-col-xl-pull-20 {
                position: relative;
                right: 83.33333%
            }

            .el-col-xl-push-20 {
                position: relative;
                left: 83.33333%
            }

            .el-col-xl-21 {
                width: 87.5%
            }

            .el-col-xl-offset-21 {
                margin-left: 87.5%
            }

            .el-col-xl-pull-21 {
                position: relative;
                right: 87.5%
            }

            .el-col-xl-push-21 {
                position: relative;
                left: 87.5%
            }

            .el-col-xl-22 {
                width: 91.66667%
            }

            .el-col-xl-offset-22 {
                margin-left: 91.66667%
            }

            .el-col-xl-pull-22 {
                position: relative;
                right: 91.66667%
            }

            .el-col-xl-push-22 {
                position: relative;
                left: 91.66667%
            }

            .el-col-xl-23 {
                width: 95.83333%
            }

            .el-col-xl-offset-23 {
                margin-left: 95.83333%
            }

            .el-col-xl-pull-23 {
                position: relative;
                right: 95.83333%
            }

            .el-col-xl-push-23 {
                position: relative;
                left: 95.83333%
            }

            .el-col-xl-24 {
                width: 100%
            }

            .el-col-xl-offset-24 {
                margin-left: 100%
            }

            .el-col-xl-pull-24 {
                position: relative;
                right: 100%
            }

            .el-col-xl-push-24 {
                position: relative;
                left: 100%
            }
        }

        .el-upload {
            display: inline-block;
            text-align: center;
            cursor: pointer;
            outline: 0
        }

        .el-upload__input {
            display: none
        }

        .el-upload__tip {
            font-size: 12px;
            color: #606266;
            margin-top: 7px
        }

        .el-upload iframe {
            position: absolute;
            z-index: -1;
            top: 0;
            left: 0;
            filter: alpha(opacity=0)
        }

        .el-upload--picture-card {
            background-color: #fbfdff;
            border: 1px dashed #c0ccda;
            border-radius: 6px;
            box-sizing: border-box;
            width: 148px;
            height: 148px;
            cursor: pointer;
            line-height: 146px;
            vertical-align: top
        }

        .el-upload--picture-card i {
            font-size: 28px;
            color: #8c939d
        }

        .el-upload--picture-card:hover,
        .el-upload:focus {
            border-color: #6dae43;
            color: #6dae43
        }

        .el-upload:focus .el-upload-dragger {
            border-color: #6dae43
        }

        .el-upload-dragger {
            background-color: #fff;
            border: 1px dashed #d9d9d9;
            border-radius: 6px;
            box-sizing: border-box;
            width: 360px;
            height: 180px;
            text-align: center;
            cursor: pointer;
            overflow: hidden
        }

        .el-upload-dragger .el-icon-upload {
            font-size: 67px;
            color: #c0c4cc;
            margin: 40px 0 16px;
            line-height: 50px
        }

        .el-upload-dragger+.el-upload__tip {
            text-align: center
        }

        .el-upload-dragger~.el-upload__files {
            border-top: 1px solid #dcdfe6;
            margin-top: 7px;
            padding-top: 5px
        }

        .el-upload-dragger .el-upload__text {
            color: #606266;
            font-size: 14px;
            text-align: center
        }

        .el-upload-dragger .el-upload__text em {
            color: #6dae43;
            font-style: normal
        }

        .el-upload-dragger:hover {
            border-color: #6dae43
        }

        .el-upload-dragger.is-dragover {
            background-color: rgba(32, 159, 255, .06);
            border: 2px dashed #6dae43
        }

        .el-upload-list {
            margin: 0;
            padding: 0;
            list-style: none
        }

        .el-upload-list__item {
            transition: all .5s cubic-bezier(.55, 0, .1, 1);
            font-size: 14px;
            color: #606266;
            line-height: 1.8;
            margin-top: 5px;
            box-sizing: border-box;
            border-radius: 4px;
            width: 100%
        }

        .el-upload-list__item .el-progress {
            position: absolute;
            top: 20px;
            width: 100%
        }

        .el-upload-list__item .el-progress__text {
            position: absolute;
            right: 0;
            top: -13px
        }

        .el-upload-list__item .el-progress-bar {
            margin-right: 0;
            padding-right: 0
        }

        .el-upload-list__item:first-child {
            margin-top: 10px
        }

        .el-upload-list__item .el-icon-upload-success {
            color: #67c23a
        }

        .el-upload-list__item .el-icon-close {
            display: none;
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            opacity: .75;
            color: #606266
        }

        .el-upload-list__item .el-icon-close:hover {
            opacity: 1
        }

        .el-upload-list__item .el-icon-close-tip {
            display: none;
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 12px;
            cursor: pointer;
            opacity: 1;
            color: #6dae43
        }

        .el-upload-list__item:hover .el-icon-close {
            display: inline-block
        }

        .el-upload-list__item:hover .el-progress__text {
            display: none
        }

        .el-upload-list__item.is-success .el-upload-list__item-status-label {
            display: block
        }

        .el-upload-list__item.is-success .el-upload-list__item-name:focus,
        .el-upload-list__item.is-success .el-upload-list__item-name:hover {
            color: #6dae43;
            cursor: pointer
        }

        .el-upload-list__item.is-success:focus:not(:hover) .el-icon-close-tip {
            display: inline-block
        }

        .el-upload-list__item.is-success:active,
        .el-upload-list__item.is-success:not(.focusing):focus {
            outline-width: 0
        }

        .el-upload-list__item.is-success:active .el-icon-close-tip,
        .el-upload-list__item.is-success:focus .el-upload-list__item-status-label,
        .el-upload-list__item.is-success:hover .el-upload-list__item-status-label,
        .el-upload-list__item.is-success:not(.focusing):focus .el-icon-close-tip {
            display: none
        }

        .el-upload-list.is-disabled .el-upload-list__item:hover .el-upload-list__item-status-label {
            display: block
        }

        .el-upload-list__item-name {
            color: #606266;
            display: block;
            margin-right: 40px;
            overflow: hidden;
            padding-left: 4px;
            text-overflow: ellipsis;
            transition: color .3s;
            white-space: nowrap
        }

        .el-upload-list__item-name [class^=el-icon] {
            height: 100%;
            margin-right: 7px;
            color: #909399;
            line-height: inherit
        }

        .el-upload-list__item-status-label {
            position: absolute;
            right: 5px;
            top: 0;
            line-height: inherit;
            display: none
        }

        .el-upload-list__item-delete {
            position: absolute;
            right: 10px;
            top: 0;
            font-size: 12px;
            color: #606266;
            display: none
        }

        .el-upload-list__item-delete:hover {
            color: #6dae43
        }

        .el-upload-list--picture-card {
            margin: 0;
            display: inline;
            vertical-align: top
        }

        .el-upload-list--picture-card .el-upload-list__item {
            overflow: hidden;
            background-color: #fff;
            border: 1px solid #c0ccda;
            border-radius: 6px;
            box-sizing: border-box;
            width: 148px;
            height: 148px;
            margin: 0 8px 8px 0;
            display: inline-block
        }

        .el-upload-list--picture-card .el-upload-list__item .el-icon-check,
        .el-upload-list--picture-card .el-upload-list__item .el-icon-circle-check {
            color: #fff
        }

        .el-upload-list--picture-card .el-upload-list__item .el-icon-close,
        .el-upload-list--picture-card .el-upload-list__item:hover .el-upload-list__item-status-label {
            display: none
        }

        .el-upload-list--picture-card .el-upload-list__item:hover .el-progress__text {
            display: block
        }

        .el-upload-list--picture-card .el-upload-list__item-name {
            display: none
        }

        .el-upload-list--picture-card .el-upload-list__item-thumbnail {
            width: 100%;
            height: 100%
        }

        .el-upload-list--picture-card .el-upload-list__item-status-label {
            position: absolute;
            right: -15px;
            top: -6px;
            width: 40px;
            height: 24px;
            background: #13ce66;
            text-align: center;
            transform: rotate(45deg);
            box-shadow: 0 0 1pc 1px rgba(0, 0, 0, .2)
        }

        .el-upload-list--picture-card .el-upload-list__item-status-label i {
            font-size: 12px;
            margin-top: 11px;
            transform: rotate(-45deg)
        }

        .el-upload-list--picture-card .el-upload-list__item-actions {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            cursor: default;
            text-align: center;
            color: #fff;
            opacity: 0;
            font-size: 20px;
            background-color: rgba(0, 0, 0, .5);
            transition: opacity .3s
        }

        .el-upload-list--picture-card .el-upload-list__item-actions:after {
            display: inline-block;
            height: 100%;
            vertical-align: middle
        }

        .el-upload-list--picture-card .el-upload-list__item-actions span {
            display: none;
            cursor: pointer
        }

        .el-upload-list--picture-card .el-upload-list__item-actions span+span {
            margin-left: 15px
        }

        .el-upload-list--picture-card .el-upload-list__item-actions .el-upload-list__item-delete {
            position: static;
            font-size: inherit;
            color: inherit
        }

        .el-upload-list--picture-card .el-upload-list__item-actions:hover {
            opacity: 1
        }

        .el-upload-list--picture-card .el-upload-list__item-actions:hover span {
            display: inline-block
        }

        .el-upload-list--picture-card .el-progress {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            bottom: auto;
            width: 126px
        }

        .el-upload-list--picture-card .el-progress .el-progress__text {
            top: 50%
        }

        .el-upload-list--picture .el-upload-list__item {
            overflow: hidden;
            z-index: 0;
            background-color: #fff;
            border: 1px solid #c0ccda;
            border-radius: 6px;
            box-sizing: border-box;
            margin-top: 10px;
            padding: 10px 10px 10px 90px;
            height: 92px
        }

        .el-upload-list--picture .el-upload-list__item .el-icon-check,
        .el-upload-list--picture .el-upload-list__item .el-icon-circle-check {
            color: #fff
        }

        .el-upload-list--picture .el-upload-list__item:hover .el-upload-list__item-status-label {
            background: 0 0;
            box-shadow: none;
            top: -2px;
            right: -12px
        }

        .el-upload-list--picture .el-upload-list__item:hover .el-progress__text {
            display: block
        }

        .el-upload-list--picture .el-upload-list__item.is-success .el-upload-list__item-name {
            line-height: 70px;
            margin-top: 0
        }

        .el-upload-list--picture .el-upload-list__item.is-success .el-upload-list__item-name i {
            display: none
        }

        .el-upload-list--picture .el-upload-list__item-thumbnail {
            vertical-align: middle;
            display: inline-block;
            width: 70px;
            height: 70px;
            float: left;
            position: relative;
            z-index: 1;
            margin-left: -80px;
            background-color: #fff
        }

        .el-upload-list--picture .el-upload-list__item-name {
            display: block;
            margin-top: 20px
        }

        .el-upload-list--picture .el-upload-list__item-name i {
            font-size: 70px;
            line-height: 1;
            position: absolute;
            left: 9px;
            top: 10px
        }

        .el-upload-list--picture .el-upload-list__item-status-label {
            position: absolute;
            right: -17px;
            top: -7px;
            width: 46px;
            height: 26px;
            background: #13ce66;
            text-align: center;
            transform: rotate(45deg);
            box-shadow: 0 1px 1px #ccc
        }

        .el-upload-list--picture .el-upload-list__item-status-label i {
            font-size: 12px;
            margin-top: 12px;
            transform: rotate(-45deg)
        }

        .el-upload-list--picture .el-progress {
            position: relative;
            top: -7px
        }

        .el-upload-cover {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 10;
            cursor: default
        }

        .el-upload-cover:after {
            display: inline-block;
            height: 100%;
            vertical-align: middle
        }

        .el-upload-cover img {
            display: block;
            width: 100%;
            height: 100%
        }

        .el-upload-cover__label {
            position: absolute;
            right: -15px;
            top: -6px;
            width: 40px;
            height: 24px;
            background: #13ce66;
            text-align: center;
            transform: rotate(45deg);
            box-shadow: 0 0 1pc 1px rgba(0, 0, 0, .2)
        }

        .el-upload-cover__label i {
            font-size: 12px;
            margin-top: 11px;
            transform: rotate(-45deg);
            color: #fff
        }

        .el-upload-cover__progress {
            display: inline-block;
            vertical-align: middle;
            position: static;
            width: 243px
        }

        .el-upload-cover__progress+.el-upload__inner {
            opacity: 0
        }

        .el-upload-cover__content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%
        }

        .el-upload-cover__interact {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .72);
            text-align: center
        }

        .el-upload-cover__interact .btn {
            display: inline-block;
            color: #fff;
            font-size: 14px;
            cursor: pointer;
            vertical-align: middle;
            transition: transform .3s cubic-bezier(.23, 1, .32, 1), opacity .3s cubic-bezier(.23, 1, .32, 1);
            margin-top: 60px
        }

        .el-upload-cover__interact .btn span {
            opacity: 0;
            transition: opacity .15s linear
        }

        .el-upload-cover__interact .btn:not(:first-child) {
            margin-left: 35px
        }

        .el-upload-cover__interact .btn:hover {
            transform: translateY(-13px)
        }

        .el-upload-cover__interact .btn:hover span {
            opacity: 1
        }

        .el-upload-cover__interact .btn i {
            color: #fff;
            display: block;
            font-size: 24px;
            line-height: inherit;
            margin: 0 auto 5px
        }

        .el-upload-cover__title {
            position: absolute;
            bottom: 0;
            left: 0;
            background-color: #fff;
            height: 36px;
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-weight: 400;
            text-align: left;
            padding: 0 10px;
            margin: 0;
            line-height: 36px;
            font-size: 14px;
            color: #303133
        }

        .el-upload-cover+.el-upload__inner {
            opacity: 0;
            position: relative;
            z-index: 1
        }

        .el-progress {
            position: relative;
            line-height: 1
        }

        .el-progress__text {
            font-size: 14px;
            color: #606266;
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
            line-height: 1
        }

        .el-progress__text i {
            vertical-align: middle;
            display: block
        }

        .el-progress--circle,
        .el-progress--dashboard {
            display: inline-block
        }

        .el-progress--circle .el-progress__text,
        .el-progress--dashboard .el-progress__text {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            margin: 0;
            transform: translateY(-50%)
        }

        .el-progress--circle .el-progress__text i,
        .el-progress--dashboard .el-progress__text i {
            vertical-align: middle;
            display: inline-block
        }

        .el-progress--without-text .el-progress__text {
            display: none
        }

        .el-progress--without-text .el-progress-bar {
            padding-right: 0;
            margin-right: 0;
            display: block
        }

        .el-progress-bar,
        .el-progress-bar__inner:after,
        .el-progress-bar__innerText,
        .el-spinner {
            display: inline-block;
            vertical-align: middle
        }

        .el-progress--text-inside .el-progress-bar {
            padding-right: 0;
            margin-right: 0
        }

        .el-progress.is-success .el-progress-bar__inner {
            background-color: #67c23a
        }

        .el-progress.is-success .el-progress__text {
            color: #67c23a
        }

        .el-progress.is-warning .el-progress-bar__inner {
            background-color: #e6a23c
        }

        .el-badge__content,
        .el-progress.is-exception .el-progress-bar__inner {
            background-color: #f56c6c
        }

        .el-progress.is-warning .el-progress__text {
            color: #e6a23c
        }

        .el-progress.is-exception .el-progress__text {
            color: #f56c6c
        }

        .el-progress-bar {
            padding-right: 50px;
            width: 100%;
            margin-right: -55px;
            box-sizing: border-box
        }

        .el-card__header,
        .el-message,
        .el-progress-bar,
        .el-step__icon {
            -webkit-box-sizing: border-box
        }

        .el-progress-bar__outer {
            height: 6px;
            border-radius: 100px;
            background-color: #ebeef5;
            overflow: hidden;
            position: relative;
            vertical-align: middle
        }

        .el-progress-bar__inner {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            background-color: #6dae43;
            text-align: right;
            border-radius: 100px;
            line-height: 1;
            white-space: nowrap;
            transition: width .6s ease
        }

        .el-progress-bar__inner:after {
            height: 100%
        }

        .el-progress-bar__innerText {
            color: #fff;
            font-size: 12px;
            margin: 0 5px
        }

        @keyframes progress {
            0% {
                background-position: 0 0
            }

            to {
                background-position: 32px 0
            }
        }

        .el-time-spinner {
            width: 100%;
            white-space: nowrap
        }

        .el-spinner-inner {
            animation: rotate 2s linear infinite;
            width: 50px;
            height: 50px
        }

        .el-spinner-inner .path {
            stroke: #ececec;
            stroke-linecap: round;
            animation: dash 1.5s ease-in-out infinite
        }

        @keyframes rotate {
            to {
                transform: rotate(1turn)
            }
        }

        @keyframes dash {
            0% {
                stroke-dasharray: 1, 150;
                stroke-dashoffset: 0
            }

            50% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -35
            }

            to {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -124
            }
        }

        .el-message {
            min-width: 380px;
            box-sizing: border-box;
            border-radius: 4px;
            border: 1px solid #ebeef5;
            position: fixed;
            left: 50%;
            top: 20px;
            transform: translateX(-50%);
            background-color: #edf2fc;
            transition: opacity .3s, transform .4s, top .4s;
            overflow: hidden;
            padding: 15px 15px 15px 20px;
            display: flex;
            align-items: center
        }

        .el-message.is-center {
            justify-content: center
        }

        .el-message.is-closable .el-message__content {
            padding-right: 16px
        }

        .el-message p {
            margin: 0
        }

        .el-message--info .el-message__content {
            color: #909399
        }

        .el-message--success {
            background-color: #f0f9eb;
            border-color: #e1f3d8
        }

        .el-message--success .el-message__content {
            color: #67c23a
        }

        .el-message--warning {
            background-color: #fdf6ec;
            border-color: #faecd8
        }

        .el-message--warning .el-message__content {
            color: #e6a23c
        }

        .el-message--error {
            background-color: #fef0f0;
            border-color: #fde2e2
        }

        .el-message--error .el-message__content {
            color: #f56c6c
        }

        .el-message__icon {
            margin-right: 10px
        }

        .el-message__content {
            padding: 0;
            font-size: 14px;
            line-height: 1
        }

        .el-message__content:focus {
            outline-width: 0
        }

        .el-message__closeBtn {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #c0c4cc;
            font-size: 16px
        }

        .el-message__closeBtn:focus {
            outline-width: 0
        }

        .el-message__closeBtn:hover {
            color: #909399
        }

        .el-message .el-icon-success {
            color: #67c23a
        }

        .el-message .el-icon-error {
            color: #f56c6c
        }

        .el-message .el-icon-info {
            color: #909399
        }

        .el-message .el-icon-warning {
            color: #e6a23c
        }

        .el-message-fade-enter,
        .el-message-fade-leave-active {
            opacity: 0;
            transform: translate(-50%, -100%)
        }

        .el-badge {
            position: relative;
            vertical-align: middle;
            display: inline-block
        }

        .el-badge__content {
            border-radius: 10px;
            color: #fff;
            display: inline-block;
            font-size: 12px;
            height: 18px;
            line-height: 18px;
            padding: 0 6px;
            text-align: center;
            white-space: nowrap;
            border: 1px solid #fff
        }

        .el-badge__content.is-fixed {
            position: absolute;
            top: 0;
            right: 10px;
            transform: translateY(-50%) translateX(100%)
        }

        .el-rate__icon,
        .el-rate__item {
            position: relative;
            display: inline-block
        }

        .el-badge__content.is-fixed.is-dot {
            right: 5px
        }

        .el-badge__content.is-dot {
            height: 8px;
            width: 8px;
            padding: 0;
            right: 0;
            border-radius: 50%
        }

        .el-badge__content--primary {
            background-color: #6dae43
        }

        .el-badge__content--success {
            background-color: #67c23a
        }

        .el-badge__content--warning {
            background-color: #e6a23c
        }

        .el-badge__content--info {
            background-color: #909399
        }

        .el-badge__content--danger {
            background-color: #f56c6c
        }

        .el-card {
            border-radius: 4px;
            border: 1px solid #ebeef5;
            background-color: #fff;
            overflow: hidden;
            color: #303133;
            transition: .3s
        }

        .el-card.is-always-shadow,
        .el-card.is-hover-shadow:focus,
        .el-card.is-hover-shadow:hover {
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1)
        }

        .el-card__header {
            padding: 18px 20px;
            border-bottom: 1px solid #ebeef5;
            box-sizing: border-box
        }

        .el-card__body,
        .el-main {
            padding: 20px
        }

        .el-rate {
            height: 20px;
            line-height: 1
        }

        .el-carousel__item,
        .el-carousel__mask {
            height: 100%;
            position: absolute;
            width: 100%
        }

        .el-rate:active,
        .el-rate:focus {
            outline-width: 0
        }

        .el-rate__item {
            font-size: 0;
            vertical-align: middle
        }

        .el-rate__icon {
            font-size: 18px;
            margin-right: 6px;
            color: #c0c4cc;
            transition: .3s
        }

        .el-rate__decimal,
        .el-rate__icon .path2 {
            position: absolute;
            top: 0;
            left: 0
        }

        .el-rate__icon.hover {
            transform: scale(1.15)
        }

        .el-rate__decimal {
            display: inline-block;
            overflow: hidden
        }

        .el-step.is-vertical,
        .el-steps {
            display: -ms-flexbox
        }

        .el-rate__text {
            font-size: 14px;
            vertical-align: middle
        }

        .el-steps {
            display: flex
        }

        .el-steps--simple {
            padding: 13px 8%;
            border-radius: 4px;
            background: #f5f7fa
        }

        .el-steps--horizontal {
            white-space: nowrap
        }

        .el-steps--vertical {
            height: 100%;
            flex-flow: column
        }

        .el-step {
            position: relative;
            flex-shrink: 1
        }

        .el-step:last-of-type .el-step__line {
            display: none
        }

        .el-step:last-of-type.is-flex {
            flex-basis: auto !important;
            flex-shrink: 0;
            flex-grow: 0
        }

        .el-step:last-of-type .el-step__description,
        .el-step:last-of-type .el-step__main {
            padding-right: 0
        }

        .el-step__head {
            position: relative;
            width: 100%
        }

        .el-step__head.is-process {
            color: #303133;
            border-color: #303133
        }

        .el-step__head.is-wait {
            color: #c0c4cc;
            border-color: #c0c4cc
        }

        .el-step__head.is-success {
            color: #67c23a;
            border-color: #67c23a
        }

        .el-step__head.is-error {
            color: #f56c6c;
            border-color: #f56c6c
        }

        .el-step__head.is-finish {
            color: #6dae43;
            border-color: #6dae43
        }

        .el-step__icon {
            position: relative;
            z-index: 1;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 24px;
            height: 24px;
            font-size: 14px;
            box-sizing: border-box;
            background: #fff;
            transition: .15s ease-out
        }

        .el-step.is-horizontal,
        .el-step__icon-inner {
            display: inline-block
        }

        .el-step__icon.is-text {
            border-radius: 50%;
            border: 2px solid;
            border-color: inherit
        }

        .el-step__icon.is-icon {
            width: 40px
        }

        .el-step__icon-inner {
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            text-align: center;
            font-weight: 700;
            line-height: 1;
            color: inherit
        }

        .el-step__icon-inner[class*=el-icon]:not(.is-status) {
            font-size: 25px;
            font-weight: 400
        }

        .el-step__icon-inner.is-status {
            transform: translateY(1px)
        }

        .el-step__line {
            position: absolute;
            border-color: inherit;
            background-color: #c0c4cc
        }

        .el-step__line-inner {
            display: block;
            border: 1px solid;
            border-color: inherit;
            transition: .15s ease-out;
            box-sizing: border-box;
            width: 0;
            height: 0
        }

        .el-step__main {
            white-space: normal;
            text-align: left
        }

        .el-step__title {
            font-size: 16px;
            line-height: 38px
        }

        .el-step__title.is-process {
            font-weight: 700;
            color: #303133
        }

        .el-step__title.is-wait {
            color: #c0c4cc
        }

        .el-step__title.is-success {
            color: #67c23a
        }

        .el-step__title.is-error {
            color: #f56c6c
        }

        .el-step__title.is-finish {
            color: #6dae43
        }

        .el-step__description {
            padding-right: 10%;
            margin-top: -5px;
            font-size: 12px;
            line-height: 20px;
            font-weight: 400
        }

        .el-step__description.is-process {
            color: #303133
        }

        .el-step__description.is-wait {
            color: #c0c4cc
        }

        .el-step__description.is-success {
            color: #67c23a
        }

        .el-step__description.is-error {
            color: #f56c6c
        }

        .el-step__description.is-finish {
            color: #6dae43
        }

        .el-step.is-horizontal .el-step__line {
            height: 2px;
            top: 11px;
            left: 0;
            right: 0
        }

        .el-step.is-vertical {
            display: flex
        }

        .el-step.is-vertical .el-step__head {
            flex-grow: 0;
            width: 24px
        }

        .el-step.is-vertical .el-step__main {
            padding-left: 10px;
            flex-grow: 1
        }

        .el-step.is-vertical .el-step__title {
            line-height: 24px;
            padding-bottom: 8px
        }

        .el-step.is-vertical .el-step__line {
            width: 2px;
            top: 0;
            bottom: 0;
            left: 11px
        }

        .el-step.is-vertical .el-step__icon.is-icon {
            width: 24px
        }

        .el-step.is-center .el-step__head,
        .el-step.is-center .el-step__main {
            text-align: center
        }

        .el-step.is-center .el-step__description {
            padding-left: 20%;
            padding-right: 20%
        }

        .el-step.is-center .el-step__line {
            left: 50%;
            right: -50%
        }

        .el-step.is-simple {
            display: flex;
            align-items: center
        }

        .el-step.is-simple .el-step__head {
            width: auto;
            font-size: 0;
            padding-right: 10px
        }

        .el-step.is-simple .el-step__icon {
            background: 0 0;
            width: 16px;
            height: 16px;
            font-size: 12px
        }

        .el-step.is-simple .el-step__icon-inner[class*=el-icon]:not(.is-status) {
            font-size: 18px
        }

        .el-step.is-simple .el-step__icon-inner.is-status {
            transform: scale(.8) translateY(1px)
        }

        .el-step.is-simple .el-step__main {
            position: relative;
            display: flex;
            align-items: stretch;
            flex-grow: 1
        }

        .el-step.is-simple .el-step__title {
            font-size: 16px;
            line-height: 20px
        }

        .el-step.is-simple:not(:last-of-type) .el-step__title {
            max-width: 50%;
            word-break: break-all
        }

        .el-step.is-simple .el-step__arrow {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .el-step.is-simple .el-step__arrow:after,
        .el-step.is-simple .el-step__arrow:before {
            content: "";
            display: inline-block;
            position: absolute;
            height: 15px;
            width: 1px;
            background: #c0c4cc
        }

        .el-step.is-simple .el-step__arrow:before {
            transform: rotate(-45deg) translateY(-4px);
            transform-origin: 0 0
        }

        .el-step.is-simple .el-step__arrow:after {
            transform: rotate(45deg) translateY(4px);
            transform-origin: 100% 100%
        }

        .el-step.is-simple:last-of-type .el-step__arrow {
            display: none
        }

        .el-carousel {
            position: relative
        }

        .el-carousel--horizontal {
            overflow-x: hidden
        }

        .el-carousel--vertical {
            overflow-y: hidden
        }

        .el-carousel__container {
            position: relative;
            height: 300px
        }

        .el-carousel__arrow {
            border: none;
            outline: 0;
            padding: 0;
            margin: 0;
            height: 36px;
            width: 36px;
            cursor: pointer;
            transition: .3s;
            border-radius: 50%;
            background-color: rgba(31, 45, 61, .11);
            color: #fff;
            position: absolute;
            top: 50%;
            z-index: 10;
            transform: translateY(-50%);
            text-align: center;
            font-size: 12px
        }

        .el-carousel__arrow--left {
            left: 16px
        }

        .el-carousel__arrow--right {
            right: 16px
        }

        .el-carousel__arrow:hover {
            background-color: rgba(31, 45, 61, .23)
        }

        .el-carousel__arrow i {
            cursor: pointer
        }

        .el-carousel__indicators {
            position: absolute;
            list-style: none;
            margin: 0;
            padding: 0;
            z-index: 2
        }

        .el-carousel__indicators--horizontal {
            bottom: 0;
            left: 50%;
            transform: translateX(-50%)
        }

        .el-carousel__indicators--vertical {
            right: 0;
            top: 50%;
            transform: translateY(-50%)
        }

        .el-carousel__indicators--outside {
            bottom: 26px;
            text-align: center;
            position: static;
            transform: none
        }

        .el-carousel__indicators--outside .el-carousel__indicator:hover button {
            opacity: .64
        }

        .el-carousel__indicators--outside button {
            background-color: #c0c4cc;
            opacity: .24
        }

        .el-carousel__indicators--labels {
            left: 0;
            right: 0;
            transform: none;
            text-align: center
        }

        .el-carousel__indicators--labels .el-carousel__button {
            height: auto;
            width: auto;
            padding: 2px 18px;
            font-size: 12px
        }

        .el-carousel__indicators--labels .el-carousel__indicator {
            padding: 6px 4px
        }

        .el-carousel__indicator {
            background-color: transparent;
            cursor: pointer
        }

        .el-carousel__indicator:hover button {
            opacity: .72
        }

        .el-carousel__indicator--horizontal {
            display: inline-block;
            padding: 12px 4px
        }

        .el-carousel__indicator--vertical {
            padding: 4px 12px
        }

        .el-carousel__indicator--vertical .el-carousel__button {
            width: 2px;
            height: 15px
        }

        .el-carousel__indicator.is-active button {
            opacity: 1
        }

        .el-carousel__button {
            display: block;
            opacity: .48;
            width: 30px;
            height: 2px;
            background-color: #fff;
            border: none;
            outline: 0;
            padding: 0;
            margin: 0;
            cursor: pointer;
            transition: .3s
        }

        .carousel-arrow-left-enter,
        .carousel-arrow-left-leave-active {
            transform: translateY(-50%) translateX(-10px);
            opacity: 0
        }

        .carousel-arrow-right-enter,
        .carousel-arrow-right-leave-active {
            transform: translateY(-50%) translateX(10px);
            opacity: 0
        }

        .el-carousel__item {
            top: 0;
            left: 0;
            display: inline-block;
            overflow: hidden;
            z-index: 0
        }

        .el-carousel__item.is-active {
            z-index: 2
        }

        .el-carousel__item--card,
        .el-carousel__item.is-animating {
            transition: transform .4s ease-in-out
        }

        .el-carousel__item--card {
            width: 50%
        }

        .el-carousel__item--card.is-in-stage {
            cursor: pointer;
            z-index: 1
        }

        .el-carousel__item--card.is-in-stage.is-hover .el-carousel__mask,
        .el-carousel__item--card.is-in-stage:hover .el-carousel__mask {
            opacity: .12
        }

        .el-carousel__item--card.is-active {
            z-index: 2
        }

        .el-carousel__mask {
            top: 0;
            left: 0;
            background-color: #fff;
            opacity: .24;
            transition: .2s
        }

        .fade-in-linear-enter-active,
        .fade-in-linear-leave-active {
            transition: opacity .2s linear
        }

        .fade-in-linear-enter,
        .fade-in-linear-leave,
        .fade-in-linear-leave-active {
            opacity: 0
        }

        .el-fade-in-linear-enter-active,
        .el-fade-in-linear-leave-active {
            transition: opacity .2s linear
        }

        .el-fade-in-linear-enter,
        .el-fade-in-linear-leave,
        .el-fade-in-linear-leave-active {
            opacity: 0
        }

        .el-fade-in-enter-active,
        .el-fade-in-leave-active {
            transition: all .3s cubic-bezier(.55, 0, .1, 1)
        }

        .el-fade-in-enter,
        .el-fade-in-leave-active {
            opacity: 0
        }

        .el-zoom-in-center-enter-active,
        .el-zoom-in-center-leave-active {
            transition: all .3s cubic-bezier(.55, 0, .1, 1)
        }

        .el-zoom-in-center-enter,
        .el-zoom-in-center-leave-active {
            opacity: 0;
            transform: scaleX(0)
        }

        .el-zoom-in-top-enter-active,
        .el-zoom-in-top-leave-active {
            opacity: 1;
            transform: scaleY(1);
            transition: transform .3s cubic-bezier(.23, 1, .32, 1), opacity .3s cubic-bezier(.23, 1, .32, 1);
            transform-origin: center top
        }

        .el-zoom-in-top-enter,
        .el-zoom-in-top-leave-active {
            opacity: 0;
            transform: scaleY(0)
        }

        .el-zoom-in-bottom-enter-active,
        .el-zoom-in-bottom-leave-active {
            opacity: 1;
            transform: scaleY(1);
            transition: transform .3s cubic-bezier(.23, 1, .32, 1), opacity .3s cubic-bezier(.23, 1, .32, 1);
            transform-origin: center bottom
        }

        .el-zoom-in-bottom-enter,
        .el-zoom-in-bottom-leave-active {
            opacity: 0;
            transform: scaleY(0)
        }

        .el-zoom-in-left-enter-active,
        .el-zoom-in-left-leave-active {
            opacity: 1;
            transform: scale(1);
            transition: transform .3s cubic-bezier(.23, 1, .32, 1), opacity .3s cubic-bezier(.23, 1, .32, 1);
            transform-origin: top left
        }

        .el-zoom-in-left-enter,
        .el-zoom-in-left-leave-active {
            opacity: 0;
            transform: scale(.45)
        }

        .collapse-transition {
            transition: height .3s ease-in-out, padding-top .3s ease-in-out, padding-bottom .3s ease-in-out
        }

        .horizontal-collapse-transition {
            transition: width .3s ease-in-out, padding-left .3s ease-in-out, padding-right .3s ease-in-out
        }

        .el-list-enter-active,
        .el-list-leave-active {
            transition: all 1s
        }

        .el-list-enter,
        .el-list-leave-active {
            opacity: 0;
            transform: translateY(-30px)
        }

        .el-opacity-transition {
            transition: opacity .3s cubic-bezier(.55, 0, .1, 1)
        }

        .el-collapse {
            border-top: 1px solid #ebeef5;
            border-bottom: 1px solid #ebeef5
        }

        .el-collapse-item.is-disabled .el-collapse-item__header {
            color: #bbb;
            cursor: not-allowed
        }

        .el-collapse-item__header {
            display: flex;
            align-items: center;
            height: 48px;
            line-height: 48px;
            background-color: #fff;
            color: #303133;
            cursor: pointer;
            border-bottom: 1px solid #ebeef5;
            font-size: 13px;
            font-weight: 500;
            transition: border-bottom-color .3s;
            outline: 0
        }

        .el-collapse-item__header.focusing:focus:not(:hover),
        .el-tag {
            color: #6dae43
        }

        .el-collapse-item__arrow {
            margin: 0 8px 0 auto;
            transition: transform .3s;
            font-weight: 300
        }

        .el-collapse-item__arrow.is-active {
            transform: rotate(90deg)
        }

        .el-collapse-item__header.is-active {
            border-bottom-color: transparent
        }

        .el-collapse-item__wrap {
            will-change: height;
            background-color: #fff;
            overflow: hidden;
            box-sizing: border-box;
            border-bottom: 1px solid #ebeef5
        }

        .el-cascader__search-input,
        .el-cascader__tags,
        .el-collapse-item__wrap,
        .el-tag {
            -webkit-box-sizing: border-box
        }

        .el-collapse-item__content {
            padding-bottom: 25px;
            font-size: 13px;
            color: #303133;
            line-height: 1.769230769230769
        }

        .el-collapse-item:last-child {
            margin-bottom: -1px
        }

        .el-popper .popper__arrow,
        .el-popper .popper__arrow:after {
            position: absolute;
            display: block;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid
        }

        .el-cascader,
        .el-tag {
            display: inline-block
        }

        .el-popper .popper__arrow {
            border-width: 6px;
            filter: drop-shadow(0 2px 12px rgba(0, 0, 0, .03))
        }

        .el-popper .popper__arrow:after {
            content: " ";
            border-width: 6px
        }

        .el-popper[x-placement^=top] {
            margin-bottom: 12px
        }

        .el-popper[x-placement^=top] .popper__arrow {
            bottom: -6px;
            left: 50%;
            margin-right: 3px;
            border-top-color: #ebeef5;
            border-bottom-width: 0
        }

        .el-popper[x-placement^=top] .popper__arrow:after {
            bottom: 1px;
            margin-left: -6px;
            border-top-color: #fff;
            border-bottom-width: 0
        }

        .el-popper[x-placement^=bottom] {
            margin-top: 12px
        }

        .el-popper[x-placement^=bottom] .popper__arrow {
            top: -6px;
            left: 50%;
            margin-right: 3px;
            border-top-width: 0;
            border-bottom-color: #ebeef5
        }

        .el-popper[x-placement^=bottom] .popper__arrow:after {
            top: 1px;
            margin-left: -6px;
            border-top-width: 0;
            border-bottom-color: #fff
        }

        .el-popper[x-placement^=right] {
            margin-left: 12px
        }

        .el-popper[x-placement^=right] .popper__arrow {
            top: 50%;
            left: -6px;
            margin-bottom: 3px;
            border-right-color: #ebeef5;
            border-left-width: 0
        }

        .el-popper[x-placement^=right] .popper__arrow:after {
            bottom: -6px;
            left: 1px;
            border-right-color: #fff;
            border-left-width: 0
        }

        .el-popper[x-placement^=left] {
            margin-right: 12px
        }

        .el-popper[x-placement^=left] .popper__arrow {
            top: 50%;
            right: -6px;
            margin-bottom: 3px;
            border-right-width: 0;
            border-left-color: #ebeef5
        }

        .el-popper[x-placement^=left] .popper__arrow:after {
            right: 1px;
            bottom: -6px;
            margin-left: -6px;
            border-right-width: 0;
            border-left-color: #fff
        }

        .el-tag {
            background-color: #f0f7ec;
            height: 32px;
            padding: 0 10px;
            line-height: 30px;
            font-size: 12px;
            border: 1px solid #e2efd9;
            border-radius: 4px;
            box-sizing: border-box;
            white-space: nowrap
        }

        .el-tag.is-hit {
            border-color: #6dae43
        }

        .el-tag .el-tag__close {
            color: #6dae43
        }

        .el-tag .el-tag__close:hover {
            color: #fff;
            background-color: #6dae43
        }

        .el-tag.el-tag--info {
            background-color: #f4f4f5;
            border-color: #e9e9eb;
            color: #909399
        }

        .el-tag.el-tag--info.is-hit {
            border-color: #909399
        }

        .el-tag.el-tag--info .el-tag__close {
            color: #909399
        }

        .el-tag.el-tag--info .el-tag__close:hover {
            color: #fff;
            background-color: #909399
        }

        .el-tag.el-tag--success {
            background-color: #f0f9eb;
            border-color: #e1f3d8;
            color: #67c23a
        }

        .el-tag.el-tag--success.is-hit {
            border-color: #67c23a
        }

        .el-tag.el-tag--success .el-tag__close {
            color: #67c23a
        }

        .el-tag.el-tag--success .el-tag__close:hover {
            color: #fff;
            background-color: #67c23a
        }

        .el-tag.el-tag--warning {
            background-color: #fdf6ec;
            border-color: #faecd8;
            color: #e6a23c
        }

        .el-tag.el-tag--warning.is-hit {
            border-color: #e6a23c
        }

        .el-tag.el-tag--warning .el-tag__close {
            color: #e6a23c
        }

        .el-tag.el-tag--warning .el-tag__close:hover {
            color: #fff;
            background-color: #e6a23c
        }

        .el-tag.el-tag--danger {
            background-color: #fef0f0;
            border-color: #fde2e2;
            color: #f56c6c
        }

        .el-tag.el-tag--danger.is-hit {
            border-color: #f56c6c
        }

        .el-tag.el-tag--danger .el-tag__close {
            color: #f56c6c
        }

        .el-tag.el-tag--danger .el-tag__close:hover {
            color: #fff;
            background-color: #f56c6c
        }

        .el-tag .el-icon-close {
            border-radius: 50%;
            text-align: center;
            position: relative;
            cursor: pointer;
            font-size: 12px;
            height: 16px;
            width: 16px;
            line-height: 16px;
            vertical-align: middle;
            top: -1px;
            right: -5px
        }

        .el-tag .el-icon-close:before {
            display: block
        }

        .el-tag--dark {
            background-color: #6dae43;
            color: #fff
        }

        .el-tag--dark,
        .el-tag--dark.is-hit {
            border-color: #6dae43
        }

        .el-tag--dark .el-tag__close {
            color: #fff
        }

        .el-tag--dark .el-tag__close:hover {
            color: #fff;
            background-color: #8abe69
        }

        .el-tag--dark.el-tag--info {
            background-color: #909399;
            border-color: #909399;
            color: #fff
        }

        .el-tag--dark.el-tag--info.is-hit {
            border-color: #909399
        }

        .el-tag--dark.el-tag--info .el-tag__close {
            color: #fff
        }

        .el-tag--dark.el-tag--info .el-tag__close:hover {
            color: #fff;
            background-color: #a6a9ad
        }

        .el-tag--dark.el-tag--success {
            background-color: #67c23a;
            border-color: #67c23a;
            color: #fff
        }

        .el-tag--dark.el-tag--success.is-hit {
            border-color: #67c23a
        }

        .el-tag--dark.el-tag--success .el-tag__close {
            color: #fff
        }

        .el-tag--dark.el-tag--success .el-tag__close:hover {
            color: #fff;
            background-color: #85ce61
        }

        .el-tag--dark.el-tag--warning {
            background-color: #e6a23c;
            border-color: #e6a23c;
            color: #fff
        }

        .el-tag--dark.el-tag--warning.is-hit {
            border-color: #e6a23c
        }

        .el-tag--dark.el-tag--warning .el-tag__close {
            color: #fff
        }

        .el-tag--dark.el-tag--warning .el-tag__close:hover {
            color: #fff;
            background-color: #ebb563
        }

        .el-tag--dark.el-tag--danger {
            background-color: #f56c6c;
            border-color: #f56c6c;
            color: #fff
        }

        .el-tag--dark.el-tag--danger.is-hit {
            border-color: #f56c6c
        }

        .el-tag--dark.el-tag--danger .el-tag__close {
            color: #fff
        }

        .el-tag--dark.el-tag--danger .el-tag__close:hover {
            color: #fff;
            background-color: #f78989
        }

        .el-tag--plain {
            background-color: #fff;
            border-color: #c5dfb4;
            color: #6dae43
        }

        .el-tag--plain.is-hit {
            border-color: #6dae43
        }

        .el-tag--plain .el-tag__close {
            color: #6dae43
        }

        .el-tag--plain .el-tag__close:hover {
            color: #fff;
            background-color: #6dae43
        }

        .el-tag--plain.el-tag--info {
            background-color: #fff;
            border-color: #d3d4d6;
            color: #909399
        }

        .el-tag--plain.el-tag--info.is-hit {
            border-color: #909399
        }

        .el-tag--plain.el-tag--info .el-tag__close {
            color: #909399
        }

        .el-tag--plain.el-tag--info .el-tag__close:hover {
            color: #fff;
            background-color: #909399
        }

        .el-tag--plain.el-tag--success {
            background-color: #fff;
            border-color: #c2e7b0;
            color: #67c23a
        }

        .el-tag--plain.el-tag--success.is-hit {
            border-color: #67c23a
        }

        .el-tag--plain.el-tag--success .el-tag__close {
            color: #67c23a
        }

        .el-tag--plain.el-tag--success .el-tag__close:hover {
            color: #fff;
            background-color: #67c23a
        }

        .el-tag--plain.el-tag--warning {
            background-color: #fff;
            border-color: #f5dab1;
            color: #e6a23c
        }

        .el-tag--plain.el-tag--warning.is-hit {
            border-color: #e6a23c
        }

        .el-tag--plain.el-tag--warning .el-tag__close {
            color: #e6a23c
        }

        .el-tag--plain.el-tag--warning .el-tag__close:hover {
            color: #fff;
            background-color: #e6a23c
        }

        .el-tag--plain.el-tag--danger {
            background-color: #fff;
            border-color: #fbc4c4;
            color: #f56c6c
        }

        .el-tag--plain.el-tag--danger.is-hit {
            border-color: #f56c6c
        }

        .el-tag--plain.el-tag--danger .el-tag__close {
            color: #f56c6c
        }

        .el-tag--plain.el-tag--danger .el-tag__close:hover {
            color: #fff;
            background-color: #f56c6c
        }

        .el-tag--medium {
            height: 28px;
            line-height: 26px
        }

        .el-tag--medium .el-icon-close {
            transform: scale(.8)
        }

        .el-tag--small {
            height: 24px;
            padding: 0 8px;
            line-height: 22px
        }

        .el-tag--small .el-icon-close {
            transform: scale(.8)
        }

        .el-tag--mini {
            height: 20px;
            padding: 0 5px;
            line-height: 19px
        }

        .el-tag--mini .el-icon-close {
            margin-left: -3px;
            transform: scale(.7)
        }

        .el-cascader {
            position: relative;
            font-size: 14px;
            line-height: 40px
        }

        .el-cascader:not(.is-disabled):hover .el-input__inner {
            cursor: pointer;
            border-color: #c0c4cc
        }

        .el-cascader .el-input .el-input__inner:focus,
        .el-cascader .el-input.is-focus .el-input__inner {
            border-color: #6dae43
        }

        .el-cascader .el-input {
            cursor: pointer
        }

        .el-cascader .el-input .el-input__inner {
            text-overflow: ellipsis
        }

        .el-cascader .el-input .el-icon-arrow-down {
            transition: transform .3s;
            font-size: 14px
        }

        .el-cascader .el-input .el-icon-arrow-down.is-reverse {
            transform: rotate(180deg)
        }

        .el-cascader .el-input .el-icon-circle-close:hover {
            color: #909399
        }

        .el-cascader--medium {
            font-size: 14px;
            line-height: 36px
        }

        .el-cascader--small {
            font-size: 13px;
            line-height: 32px
        }

        .el-cascader--mini {
            font-size: 12px;
            line-height: 28px
        }

        .el-cascader.is-disabled .el-cascader__label {
            z-index: 2;
            color: #c0c4cc
        }



        .el-cascader__tags {
            position: absolute;
            left: 0;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-wrap: wrap;
            line-height: normal;
            text-align: left;
            box-sizing: border-box
        }

        .el-cascader__tags .el-tag {
            display: inline-flex;
            align-items: center;
            max-width: 100%;
            margin: 2px 0 2px 6px;
            text-overflow: ellipsis;
            background: #f0f2f5
        }

        .el-cascader__tags .el-tag:not(.is-hit) {
            border-color: transparent
        }

        .el-cascader__tags .el-tag>span {
            flex: 1;
            overflow: hidden;
            text-overflow: ellipsis
        }

        .el-cascader__tags .el-tag .el-icon-close {
            flex: none;
            background-color: #c0c4cc;
            color: #fff
        }

        .el-cascader__tags .el-tag .el-icon-close:hover {
            background-color: #909399
        }

        .el-cascader__suggestion-panel {
            border-radius: 4px
        }

        .el-cascader__suggestion-list {
            max-height: 204px;
            margin: 0;
            padding: 6px 0;
            font-size: 14px;
            color: #606266;
            text-align: center
        }

        .el-cascader__suggestion-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 34px;
            padding: 0 15px;
            text-align: left;
            outline: 0;
            cursor: pointer
        }

        .el-cascader__suggestion-item:focus,
        .el-cascader__suggestion-item:hover {
            background: #f5f7fa
        }

        .el-cascader__suggestion-item.is-checked {
            color: #6dae43;
            font-weight: 700
        }

        .el-cascader__suggestion-item>span {
            margin-right: 10px
        }

        .el-cascader__empty-text {
            margin: 10px 0;
            color: #c0c4cc
        }

        .el-cascader__search-input {
            flex: 1;
            height: 24px;
            min-width: 60px;
            margin: 2px 0 2px 15px;
            padding: 0;
            color: #606266;
            border: none;
            outline: 0;
            box-sizing: border-box
        }

        .el-cascader__search-input::-moz-placeholder {
            color: #c0c4cc
        }

        .el-cascader__search-input::placeholder {
            color: #c0c4cc
        }

        .el-color-predefine {
            font-size: 12px;
            margin-top: 8px;
            width: 280px
        }

        .el-color-predefine,
        .el-color-predefine__colors {
            display: flex
        }

        .el-color-predefine__colors {
            flex: 1;
            flex-wrap: wrap
        }

        .el-color-predefine__color-selector {
            margin: 0 0 8px 8px;
            width: 20px;
            height: 20px;
            border-radius: 4px;
            cursor: pointer
        }

        .el-color-predefine__color-selector:nth-child(10n+1) {
            margin-left: 0
        }

        .el-color-predefine__color-selector.selected {
            box-shadow: 0 0 3px 2px #6dae43
        }

        .el-color-predefine__color-selector>div {
            display: flex;
            height: 100%;
            border-radius: 3px
        }

        .el-color-predefine__color-selector.is-alpha {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAIAAADZF8uwAAAAGUlEQVQYV2M4gwH+YwCGIasIUwhT25BVBADtzYNYrHvv4gAAAABJRU5ErkJggg==)
        }

        .el-color-hue-slider {
            position: relative;
            box-sizing: border-box;
            width: 280px;
            height: 12px;
            background-color: red;
            padding: 0 2px
        }

        .el-color-hue-slider__bar {
            position: relative;
            background: linear-gradient(90deg, red 0, #ff0 17%, #0f0 33%, #0ff 50%, #00f 67%, #f0f 83%, red);
            height: 100%
        }

        .el-color-hue-slider__thumb {
            position: absolute;
            cursor: pointer;
            box-sizing: border-box;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            border-radius: 1px;
            background: #fff;
            border: 1px solid #f0f0f0;
            box-shadow: 0 0 2px rgba(0, 0, 0, .6);
            z-index: 1
        }

        .el-color-hue-slider.is-vertical {
            width: 12px;
            height: 180px;
            padding: 2px 0
        }

        .el-color-hue-slider.is-vertical .el-color-hue-slider__bar {
            background: linear-gradient(180deg, red 0, #ff0 17%, #0f0 33%, #0ff 50%, #00f 67%, #f0f 83%, red)
        }

        .el-color-hue-slider.is-vertical .el-color-hue-slider__thumb {
            left: 0;
            top: 0;
            width: 100%;
            height: 4px
        }

        .el-color-svpanel {
            position: relative;
            width: 280px;
            height: 180px
        }

        .el-color-svpanel__black,
        .el-color-svpanel__white {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0
        }

        .el-color-svpanel__white {
            background: linear-gradient(90deg, #fff, hsla(0, 0%, 100%, 0))
        }

        .el-color-svpanel__black {
            background: linear-gradient(0deg, #000, transparent)
        }

        .el-color-svpanel__cursor {
            position: absolute
        }

        .el-color-svpanel__cursor>div {
            cursor: head;
            width: 4px;
            height: 4px;
            box-shadow: 0 0 0 1.5px #fff, inset 0 0 1px 1px rgba(0, 0, 0, .3), 0 0 1px 2px rgba(0, 0, 0, .4);
            border-radius: 50%;
            transform: translate(-2px, -2px)
        }

        .el-color-alpha-slider {
            position: relative;
            box-sizing: border-box;
            width: 280px;
            height: 12px;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAIAAADZF8uwAAAAGUlEQVQYV2M4gwH+YwCGIasIUwhT25BVBADtzYNYrHvv4gAAAABJRU5ErkJggg==)
        }

        .el-color-alpha-slider__bar {
            position: relative;
            background: linear-gradient(90deg, hsla(0, 0%, 100%, 0) 0, #fff);
            height: 100%
        }

        .el-color-alpha-slider__thumb {
            position: absolute;
            cursor: pointer;
            box-sizing: border-box;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            border-radius: 1px;
            background: #fff;
            border: 1px solid #f0f0f0;
            box-shadow: 0 0 2px rgba(0, 0, 0, .6);
            z-index: 1
        }

        .el-color-alpha-slider.is-vertical {
            width: 20px;
            height: 180px
        }

        .el-color-alpha-slider.is-vertical .el-color-alpha-slider__bar {
            background: linear-gradient(180deg, hsla(0, 0%, 100%, 0) 0, #fff)
        }

        .el-color-alpha-slider.is-vertical .el-color-alpha-slider__thumb {
            left: 0;
            top: 0;
            width: 100%;
            height: 4px
        }








        .el-color-picker {
            display: inline-block;
            position: relative;
            line-height: normal;
            height: 40px
        }

        .el-color-picker.is-disabled .el-color-picker__trigger {
            cursor: not-allowed
        }

        .el-color-picker--medium {
            height: 36px
        }

        .el-color-picker--medium .el-color-picker__trigger {
            height: 36px;
            width: 36px
        }

        .el-color-picker--medium .el-color-picker__mask {
            height: 34px;
            width: 34px
        }

        .el-color-picker--small {
            height: 32px
        }

        .el-color-picker--small .el-color-picker__trigger {
            height: 32px;
            width: 32px
        }

        .el-color-picker--small .el-color-picker__mask {
            height: 30px;
            width: 30px
        }

        .el-color-picker--small .el-color-picker__empty,
        .el-color-picker--small .el-color-picker__icon {
            transform: translate3d(-50%, -50%, 0) scale(.8)
        }

        .el-color-picker--mini {
            height: 28px
        }

        .el-color-picker--mini .el-color-picker__trigger {
            height: 28px;
            width: 28px
        }

        .el-color-picker--mini .el-color-picker__mask {
            height: 26px;
            width: 26px
        }

        .el-color-picker--mini .el-color-picker__empty,
        .el-color-picker--mini .el-color-picker__icon {
            transform: translate3d(-50%, -50%, 0) scale(.8)
        }

        .el-color-picker__mask {
            height: 38px;
            width: 38px;
            border-radius: 4px;
            position: absolute;
            top: 1px;
            left: 1px;
            z-index: 1;
            cursor: not-allowed;
            background-color: hsla(0, 0%, 100%, .7)
        }

        .el-color-picker__trigger {
            display: inline-block;
            box-sizing: border-box;
            height: 40px;
            width: 40px;
            padding: 4px;
            border: 1px solid #e6e6e6;
            border-radius: 4px;
            font-size: 0;
            position: relative;
            cursor: pointer
        }

        .el-color-picker__color,
        .el-color-picker__trigger,
        .el-input__inner,
        .el-textarea__inner,
        .el-transfer-panel {
            -webkit-box-sizing: border-box
        }

        .el-color-picker__color {
            position: relative;
            display: block;
            box-sizing: border-box;
            border: 1px solid #999;
            border-radius: 2px;
            width: 100%;
            height: 100%;
            text-align: center
        }

        .el-color-picker__color.is-alpha {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAIAAADZF8uwAAAAGUlEQVQYV2M4gwH+YwCGIasIUwhT25BVBADtzYNYrHvv4gAAAABJRU5ErkJggg==)
        }

        .el-input__inner,
        .el-textarea__inner {
            background-image: none;
            -webkit-transition: border-color .2s cubic-bezier(.645, .045, .355, 1)
        }

        .el-color-picker__color-inner {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0
        }

        .el-color-picker__empty {
            color: #999
        }

        .el-color-picker__empty,
        .el-color-picker__icon {
            font-size: 12px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate3d(-50%, -50%, 0)
        }

        .el-color-picker__icon {
            display: inline-block;
            width: 100%;
            color: #fff;
            text-align: center
        }

        .el-color-picker__panel {
            position: absolute;
            z-index: 10;
            padding: 6px;
            box-sizing: content-box;
            background-color: #fff;
            border: 1px solid #ebeef5;
            border-radius: 4px;
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1)
        }

        .el-textarea {
            position: relative;
            display: inline-block;
            width: 100%;
            vertical-align: bottom;
            font-size: 14px
        }

        .el-textarea__inner {
            display: block;
            resize: vertical;
            padding: 5px 15px;
            line-height: 1.5;
            box-sizing: border-box;
            width: 100%;
            font-size: inherit;
            color: #606266;
            background-color: #fff;
            border: 1px solid #dcdfe6;
            border-radius: 4px;
            transition: border-color .2s cubic-bezier(.645, .045, .355, 1)
        }

        .el-textarea__inner::-moz-placeholder {
            color: #c0c4cc
        }

        .el-textarea__inner::placeholder {
            color: #c0c4cc
        }

        .el-textarea__inner:hover {
            border-color: #c0c4cc
        }

        .el-textarea__inner:focus {
            outline: 0;
            border-color: #6dae43
        }

        .el-textarea .el-input__count {
            color: #909399;
            background: #fff;
            position: absolute;
            font-size: 12px;
            bottom: 5px;
            right: 10px
        }

        .el-textarea.is-disabled .el-textarea__inner {
            background-color: #f5f7fa;
            border-color: #e4e7ed;
            color: #c0c4cc;
            cursor: not-allowed
        }

        .el-textarea.is-disabled .el-textarea__inner::-moz-placeholder {
            color: #c0c4cc
        }

        .el-textarea.is-disabled .el-textarea__inner::placeholder {
            color: #c0c4cc
        }

        .el-textarea.is-exceed .el-textarea__inner {
            border-color: #f56c6c
        }

        .el-textarea.is-exceed .el-input__count {
            color: #f56c6c
        }

        .el-input {
            position: relative;
            font-size: 14px;
            display: inline-block;
            width: 100%
        }

        .el-input::-webkit-scrollbar {
            z-index: 11;
            width: 6px
        }

        .el-input::-webkit-scrollbar:horizontal {
            height: 6px
        }

        .el-input::-webkit-scrollbar-thumb {
            border-radius: 5px;
            width: 6px;
            background: #b4bccc
        }

        .el-input::-webkit-scrollbar-corner,
        .el-input::-webkit-scrollbar-track {
            background: #fff
        }

        .el-input::-webkit-scrollbar-track-piece {
            background: #fff;
            width: 6px
        }

        .el-input .el-input__clear {
            color: #c0c4cc;
            font-size: 14px;
            cursor: pointer;
            transition: color .2s cubic-bezier(.645, .045, .355, 1)
        }

        .el-input .el-input__clear:hover {
            color: #909399
        }

        .el-input .el-input__count {
            height: 100%;
            display: inline-flex;
            align-items: center;
            color: #909399;
            font-size: 12px
        }

        .el-input .el-input__count .el-input__count-inner {
            background: #fff;
            line-height: normal;
            display: inline-block;
            padding: 0 5px
        }

        .el-input__inner {
            -webkit-appearance: none;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #dcdfe6;
            box-sizing: border-box;
            color: #606266;
            display: inline-block;
            font-size: inherit;
            height: 40px;
            line-height: 40px;
            outline: 0;
            padding: 0 15px;
            transition: border-color .2s cubic-bezier(.645, .045, .355, 1);
            width: 100%
        }

        .el-input__prefix,
        .el-input__suffix {
            position: absolute;
            top: 0;
            -webkit-transition: all .3s;
            height: 100%;
            color: #c0c4cc;
            text-align: center
        }

        .el-input__inner::-ms-reveal {
            display: none
        }

        .el-input__inner::-moz-placeholder {
            color: #c0c4cc
        }

        .el-input__inner::placeholder {
            color: #c0c4cc
        }

        .el-input__inner:hover {
            border-color: #c0c4cc
        }

        .el-input.is-active .el-input__inner,
        .el-input__inner:focus {
            border-color: #6dae43;
            outline: 0
        }

        .el-input__suffix {
            right: 5px;
            transition: all .3s;
            pointer-events: none
        }

        .el-input__suffix-inner {
            pointer-events: all
        }

        .el-input__prefix {
            left: 5px;
            transition: all .3s
        }

        .el-input__icon {
            height: 100%;
            width: 25px;
            text-align: center;
            transition: all .3s;
            line-height: 40px
        }

        .el-input__icon:after {
            content: "";
            height: 100%;
            width: 0;
            display: inline-block;
            vertical-align: middle
        }

        .el-input__validateIcon {
            pointer-events: none
        }

        .el-input.is-disabled .el-input__inner {
            background-color: #f5f7fa;
            border-color: #e4e7ed;
            color: #c0c4cc;
            cursor: not-allowed
        }

        .el-input.is-disabled .el-input__inner::-moz-placeholder {
            color: #c0c4cc
        }

        .el-input.is-disabled .el-input__inner::placeholder {
            color: #c0c4cc
        }

        .el-input.is-disabled .el-input__icon {
            cursor: not-allowed
        }

        .el-input.is-exceed .el-input__inner {
            border-color: #f56c6c
        }

        .el-input.is-exceed .el-input__suffix .el-input__count {
            color: #f56c6c
        }

        .el-input--suffix .el-input__inner {
            padding-right: 30px
        }

        .el-input--prefix .el-input__inner {
            padding-left: 30px
        }

        .el-input--medium {
            font-size: 14px
        }

        .el-input--medium .el-input__inner {
            height: 36px;
            line-height: 36px
        }

        .el-input--medium .el-input__icon {
            line-height: 36px
        }

        .el-input--small {
            font-size: 13px
        }

        .el-input--small .el-input__inner {
            height: 32px;
            line-height: 32px
        }

        .el-input--small .el-input__icon {
            line-height: 32px
        }

        .el-input--mini {
            font-size: 12px
        }

        .el-input--mini .el-input__inner {
            height: 28px;
            line-height: 28px
        }

        .el-input--mini .el-input__icon {
            line-height: 28px
        }

        .el-input-group {
            line-height: normal;
            display: inline-table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0
        }

        .el-input-group>.el-input__inner {
            vertical-align: middle;
            display: table-cell
        }

        .el-input-group__append,
        .el-input-group__prepend {
            background-color: #f5f7fa;
            color: #909399;
            vertical-align: middle;
            display: table-cell;
            position: relative;
            border: 1px solid #dcdfe6;
            border-radius: 4px;
            padding: 0 20px;
            width: 1px;
            white-space: nowrap
        }

        .el-input-group--prepend .el-input__inner,
        .el-input-group__append {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .el-input-group--append .el-input__inner,
        .el-input-group__prepend {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .el-input-group__append:focus,
        .el-input-group__prepend:focus {
            outline: 0
        }

        .el-input-group__append .el-button,
        .el-input-group__append .el-select,
        .el-input-group__prepend .el-button,
        .el-input-group__prepend .el-select {
            display: inline-block;
            margin: -10px -20px
        }

        .el-input-group__append button.el-button,
        .el-input-group__append div.el-select .el-input__inner,
        .el-input-group__append div.el-select:hover .el-input__inner,
        .el-input-group__prepend button.el-button,
        .el-input-group__prepend div.el-select .el-input__inner,
        .el-input-group__prepend div.el-select:hover .el-input__inner {
            border-color: transparent;
            background-color: transparent;
            color: inherit;
            border-top: 0;
            border-bottom: 0
        }

        .el-timeline-item__node--primary,
        .el-transfer__button {
            background-color: #6dae43
        }

        .el-input-group__append .el-button,
        .el-input-group__append .el-input,
        .el-input-group__prepend .el-button,
        .el-input-group__prepend .el-input {
            font-size: inherit
        }

        .el-input-group__prepend {
            border-right: 0
        }

        .el-input-group__append {
            border-left: 0
        }

        .el-input-group--append .el-select .el-input.is-focus .el-input__inner,
        .el-input-group--prepend .el-select .el-input.is-focus .el-input__inner {
            border-color: transparent
        }

        .el-input__inner::-ms-clear {
            display: none;
            width: 0;
            height: 0
        }

        .el-transfer {
            font-size: 14px
        }

        .el-transfer__buttons {
            display: inline-block;
            vertical-align: middle;
            padding: 0 30px
        }

        .el-transfer__button {
            display: block;
            margin: 0 auto;
            padding: 10px;
            border-radius: 50%;
            color: #fff;
            font-size: 0
        }

        .el-button-group>.el-button+.el-button,
        .el-transfer-panel__item+.el-transfer-panel__item,
        .el-transfer__button [class*=el-icon-]+span {
            margin-left: 0
        }

        .el-timeline,
        .el-transfer__button i,
        .el-transfer__button span {
            font-size: 14px
        }

        .el-transfer__button.is-with-texts {
            border-radius: 4px
        }

        .el-transfer__button.is-disabled,
        .el-transfer__button.is-disabled:hover {
            border: 1px solid #dcdfe6;
            background-color: #f5f7fa;
            color: #c0c4cc
        }

        .el-transfer__button:first-child {
            margin-bottom: 10px
        }

        .el-transfer__button:nth-child(2) {
            margin: 0
        }

        .el-transfer-panel {
            border: 1px solid #ebeef5;
            border-radius: 4px;
            overflow: hidden;
            background: #fff;
            display: inline-block;
            vertical-align: middle;
            width: 200px;
            max-height: 100%;
            box-sizing: border-box;
            position: relative
        }

        .el-transfer-panel__body {
            height: 246px
        }

        .el-transfer-panel__body.is-with-footer {
            padding-bottom: 40px
        }

        .el-transfer-panel__list {
            margin: 0;
            padding: 6px 0;
            list-style: none;
            height: 246px;
            overflow: auto;
            box-sizing: border-box
        }

        .el-transfer-panel__list.is-filterable {
            height: 194px;
            padding-top: 0
        }

        .el-transfer-panel__item {
            height: 30px;
            line-height: 30px;
            padding-left: 15px;
            display: block !important
        }

        .el-transfer-panel__item.el-checkbox {
            color: #606266
        }

        .el-transfer-panel__item:hover {
            color: #6dae43
        }

        .el-transfer-panel__item.el-checkbox .el-checkbox__label {
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: block;
            box-sizing: border-box;
            padding-left: 24px;
            line-height: 30px
        }

        .el-transfer-panel__item .el-checkbox__input {
            position: absolute;
            top: 8px
        }

        .el-transfer-panel__filter {
            text-align: center;
            margin: 15px;
            box-sizing: border-box;
            display: block;
            width: auto
        }

        .el-transfer-panel__filter .el-input__inner {
            height: 32px;
            width: 100%;
            font-size: 12px;
            display: inline-block;
            box-sizing: border-box;
            border-radius: 16px;
            padding-right: 10px;
            padding-left: 30px
        }

        .el-transfer-panel__filter .el-input__icon {
            margin-left: 5px
        }

        .el-transfer-panel__filter .el-icon-circle-close {
            cursor: pointer
        }

        .el-transfer-panel .el-transfer-panel__header {
            height: 40px;
            line-height: 40px;
            background: #f5f7fa;
            margin: 0;
            padding-left: 15px;
            border-bottom: 1px solid #ebeef5;
            box-sizing: border-box;
            color: #000
        }

        .el-container,
        .el-header {
            -webkit-box-sizing: border-box
        }

        .el-transfer-panel .el-transfer-panel__header .el-checkbox {
            display: block;
            line-height: 40px
        }

        .el-transfer-panel .el-transfer-panel__header .el-checkbox .el-checkbox__label {
            font-size: 16px;
            color: #303133;
            font-weight: 400
        }

        .el-transfer-panel .el-transfer-panel__header .el-checkbox .el-checkbox__label span {
            position: absolute;
            right: 15px;
            color: #909399;
            font-size: 12px;
            font-weight: 400
        }

        .el-transfer-panel .el-transfer-panel__footer {
            height: 40px;
            background: #fff;
            margin: 0;
            padding: 0;
            border-top: 1px solid #ebeef5;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 1
        }

        .el-transfer-panel .el-transfer-panel__footer:after {
            display: inline-block;
            height: 100%;
            vertical-align: middle
        }

        .el-container,
        .el-timeline-item__node {
            display: -ms-flexbox
        }

        .el-transfer-panel .el-transfer-panel__footer .el-checkbox {
            padding-left: 20px;
            color: #606266
        }

        .el-transfer-panel .el-transfer-panel__empty {
            margin: 0;
            height: 30px;
            line-height: 30px;
            padding: 6px 15px 0;
            color: #909399;
            text-align: center
        }

        .el-transfer-panel .el-checkbox__label {
            padding-left: 8px
        }

        .el-transfer-panel .el-checkbox__inner {
            height: 14px;
            width: 14px;
            border-radius: 3px
        }

        .el-transfer-panel .el-checkbox__inner:after {
            height: 6px;
            width: 3px;
            left: 4px
        }

        .el-container {
            display: flex;
            flex-direction: row;
            flex: 1;
            flex-basis: auto;
            box-sizing: border-box;
            min-width: 0
        }

        .el-container.is-vertical,
        .el-drawer,
        .el-empty,
        .el-result {
            -webkit-box-orient: vertical
        }

        .el-container.is-vertical {
            flex-direction: column
        }

        .el-header {
            padding: 0 20px
        }

        .el-aside,
        .el-header {
            box-sizing: border-box;
            flex-shrink: 0
        }

        .el-aside {
            overflow: auto
        }

        .el-aside,
        .el-footer,
        .el-main {
            -webkit-box-sizing: border-box
        }

        .el-main {
            display: block;
            flex: 1;
            flex-basis: auto;
            overflow: auto
        }

        .el-footer,
        .el-main {
            box-sizing: border-box
        }

        .el-footer {
            padding: 0 20px;
            flex-shrink: 0
        }

        .el-timeline {
            margin: 0;
            list-style: none
        }

        .el-timeline .el-timeline-item:last-child .el-timeline-item__tail {
            display: none
        }

        .el-timeline-item {
            position: relative;
            padding-bottom: 20px
        }

        .el-timeline-item__wrapper {
            position: relative;
            padding-left: 28px;
            top: -3px
        }

        .el-timeline-item__tail {
            position: absolute;
            left: 4px;
            height: 100%;
            border-left: 2px solid #e4e7ed
        }

        .el-timeline-item__icon {
            color: #fff;
            font-size: 13px
        }

        .el-timeline-item__node {
            position: absolute;
            background-color: #e4e7ed;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .el-image__error,
        .el-timeline-item__dot {
            display: -ms-flexbox;
            -webkit-box-pack: center
        }

        .el-timeline-item__node--normal {
            left: -1px;
            width: 12px;
            height: 12px
        }

        .el-timeline-item__node--large {
            left: -2px;
            width: 14px;
            height: 14px
        }

        .el-timeline-item__node--success {
            background-color: #67c23a
        }

        .el-timeline-item__node--warning {
            background-color: #e6a23c
        }

        .el-timeline-item__node--danger {
            background-color: #f56c6c
        }

        .el-timeline-item__node--info {
            background-color: #909399
        }

        .el-timeline-item__dot {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .el-timeline-item__content {
            color: #303133
        }

        .el-timeline-item__timestamp {
            color: #909399;
            line-height: 1;
            font-size: 13px
        }

        .el-timeline-item__timestamp.is-top {
            margin-bottom: 8px;
            padding-top: 4px
        }

        .el-timeline-item__timestamp.is-bottom {
            margin-top: 8px
        }

        .el-link {
            display: inline-flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            vertical-align: middle;
            position: relative;
            text-decoration: none;
            outline: 0;
            cursor: pointer;
            padding: 0;
            font-size: 14px;
            font-weight: 500
        }

        .el-link.is-underline:hover:after {
            position: absolute;
            left: 0;
            right: 0;
            height: 0;
            bottom: 0;
            border-bottom: 1px solid #6dae43
        }

        .el-link.el-link--default:after,
        .el-link.el-link--primary.is-underline:hover:after,
        .el-link.el-link--primary:after {
            border-color: #6dae43
        }

        .el-link.is-disabled {
            cursor: not-allowed
        }

        .el-link [class*=el-icon-]+span {
            margin-left: 5px
        }

        .el-link.el-link--default {
            color: #606266
        }

        .el-link.el-link--default:hover {
            color: #6dae43
        }

        .el-link.el-link--default.is-disabled {
            color: #c0c4cc
        }

        .el-link.el-link--primary {
            color: #6dae43
        }

        .el-link.el-link--primary:hover {
            color: #8abe69
        }

        .el-link.el-link--primary.is-disabled {
            color: #b6d7a1
        }

        .el-link.el-link--danger.is-underline:hover:after,
        .el-link.el-link--danger:after {
            border-color: #f56c6c
        }

        .el-link.el-link--danger {
            color: #f56c6c
        }

        .el-link.el-link--danger:hover {
            color: #f78989
        }

        .el-link.el-link--danger.is-disabled {
            color: #fab6b6
        }

        .el-link.el-link--success.is-underline:hover:after,
        .el-link.el-link--success:after {
            border-color: #67c23a
        }

        .el-link.el-link--success {
            color: #67c23a
        }

        .el-link.el-link--success:hover {
            color: #85ce61
        }

        .el-link.el-link--success.is-disabled {
            color: #b3e19d
        }

        .el-link.el-link--warning.is-underline:hover:after,
        .el-link.el-link--warning:after {
            border-color: #e6a23c
        }

        .el-link.el-link--warning {
            color: #e6a23c
        }

        .el-link.el-link--warning:hover {
            color: #ebb563
        }

        .el-link.el-link--warning.is-disabled {
            color: #f3d19e
        }

        .el-link.el-link--info.is-underline:hover:after,
        .el-link.el-link--info:after {
            border-color: #909399
        }

        .el-link.el-link--info {
            color: #909399
        }

        .el-link.el-link--info:hover {
            color: #a6a9ad
        }

        .el-link.el-link--info.is-disabled {
            color: #c8c9cc
        }

        .el-divider {
            background-color: #dcdfe6;
            position: relative
        }

        .el-divider--horizontal {
            display: block;
            height: 1px;
            width: 100%;
            margin: 24px 0
        }

        .el-divider--vertical {
            display: inline-block;
            width: 1px;
            height: 1em;
            margin: 0 8px;
            vertical-align: middle;
            position: relative
        }

        .el-divider__text {
            position: absolute;
            background-color: #fff;
            padding: 0 20px;
            font-weight: 500;
            color: #303133;
            font-size: 14px
        }

        .el-image__error,
        .el-image__placeholder {
            background: #f5f7fa
        }

        .el-divider__text.is-left {
            left: 20px;
            transform: translateY(-50%)
        }

        .el-divider__text.is-center {
            left: 50%;
            transform: translateX(-50%) translateY(-50%)
        }

        .el-divider__text.is-right {
            right: 20px;
            transform: translateY(-50%)
        }

        .el-image__error,
        .el-image__inner,
        .el-image__placeholder {
            width: 100%;
            height: 100%
        }

        .el-image {
            position: relative;
            display: inline-block;
            overflow: hidden
        }

        .el-image__inner {
            vertical-align: top
        }

        .el-image__inner--center {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: block
        }

        .el-image__error {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            color: #c0c4cc;
            vertical-align: middle
        }

        .el-image__preview {
            cursor: pointer
        }

        .el-image-viewer__wrapper {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0
        }

        .el-image-viewer__btn {
            position: absolute;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            opacity: .8;
            cursor: pointer;
            box-sizing: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none
        }

        .el-button,
        .el-checkbox,
        .el-checkbox-button__inner,
        .el-empty__image img,
        .el-image-viewer__btn,
        .el-radio {
            -webkit-user-select: none
        }

        .el-image-viewer__close {
            top: 40px;
            right: 40px;
            width: 40px;
            height: 40px;
            font-size: 24px;
            color: #fff;
            background-color: #606266
        }

        .el-image-viewer__canvas {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .el-image-viewer__actions {
            left: 50%;
            bottom: 30px;
            transform: translateX(-50%);
            width: 282px;
            height: 44px;
            padding: 0 23px;
            background-color: #606266;
            border-color: #fff;
            border-radius: 22px
        }

        .el-image-viewer__actions__inner {
            width: 100%;
            height: 100%;
            text-align: justify;
            cursor: default;
            font-size: 23px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-around
        }

        .el-image-viewer__next,
        .el-image-viewer__prev {
            width: 44px;
            height: 44px;
            font-size: 24px;
            color: #fff;
            background-color: #606266;
            border-color: #fff;
            top: 50%
        }

        .el-image-viewer__prev {
            left: 40px
        }

        .el-image-viewer__next,
        .el-image-viewer__prev {
            transform: translateY(-50%)
        }

        .el-image-viewer__next {
            right: 40px;
            text-indent: 2px
        }

        .el-image-viewer__mask {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: .5;
            background: #000
        }

        .viewer-fade-enter-active {
            animation: viewer-fade-in .3s
        }

        .viewer-fade-leave-active {
            animation: viewer-fade-out .3s
        }

        @keyframes viewer-fade-in {
            0% {
                transform: translate3d(0, -20px, 0);
                opacity: 0
            }

            to {
                transform: translateZ(0);
                opacity: 1
            }
        }

        @keyframes viewer-fade-out {
            0% {
                transform: translateZ(0);
                opacity: 1
            }

            to {
                transform: translate3d(0, -20px, 0);
                opacity: 0
            }
        }

        .el-button {
            display: inline-block;
            line-height: 1;
            white-space: nowrap;
            cursor: pointer;
            background: #fff;
            border: 1px solid #dcdfe6;
            color: #606266;
            -webkit-appearance: none;
            text-align: center;
            box-sizing: border-box;
            outline: 0;
            margin: 0;
            transition: .1s;
            font-weight: 500;
            padding: 12px 20px;
            font-size: 14px;
            border-radius: 4px
        }

        .el-button+.el-button,
        .el-checkbox.is-bordered+.el-checkbox.is-bordered {
            margin-left: 10px
        }

        .el-button:focus,
        .el-button:hover {
            color: #6dae43;
            border-color: #d3e7c7;
            background-color: #f0f7ec
        }

        .el-button:active {
            color: #629d3c;
            border-color: #629d3c;
            outline: 0
        }

        .el-button::-moz-focus-inner {
            border: 0
        }

        .el-button [class*=el-icon-]+span {
            margin-left: 5px
        }

        .el-button.is-plain:focus,
        .el-button.is-plain:hover {
            background: #fff;
            border-color: #6dae43;
            color: #6dae43
        }

        .el-button.is-active,
        .el-button.is-plain:active {
            color: #629d3c;
            border-color: #629d3c
        }

        .el-button.is-plain:active {
            background: #fff;
            outline: 0
        }

        .el-button.is-disabled,
        .el-button.is-disabled:focus,
        .el-button.is-disabled:hover {
            color: #c0c4cc;
            cursor: not-allowed;
            background-image: none;
            background-color: #fff;
            border-color: #ebeef5
        }

        .el-button.is-disabled.el-button--text {
            background-color: transparent
        }

        .el-button.is-disabled.is-plain,
        .el-button.is-disabled.is-plain:focus,
        .el-button.is-disabled.is-plain:hover {
            background-color: #fff;
            border-color: #ebeef5;
            color: #c0c4cc
        }

        .el-button.is-loading {
            position: relative;
            pointer-events: none
        }

        .el-button.is-loading:before {
            pointer-events: none;
            content: "";
            position: absolute;
            left: -1px;
            top: -1px;
            right: -1px;
            bottom: -1px;
            border-radius: inherit;
            background-color: hsla(0, 0%, 100%, .35)
        }

        .el-button.is-round {
            border-radius: 20px;
            padding: 12px 23px
        }

        .el-button.is-circle {
            border-radius: 50%;
            padding: 12px
        }

        .el-button--primary {
            color: #fff;
            background-color: #6dae43;
            border-color: #6dae43
        }

        .el-button--primary:focus,
        .el-button--primary:hover {
            background: #8abe69;
            border-color: #8abe69;
            color: #fff
        }

        .el-button--primary.is-active,
        .el-button--primary:active {
            background: #629d3c;
            border-color: #629d3c;
            color: #fff
        }

        .el-button--primary:active {
            outline: 0
        }

        .el-button--primary.is-disabled,
        .el-button--primary.is-disabled:active,
        .el-button--primary.is-disabled:focus,
        .el-button--primary.is-disabled:hover {
            color: #fff;
            background-color: #b6d7a1;
            border-color: #b6d7a1
        }

        .el-button--primary.is-plain {
            color: #6dae43;
            background: #f0f7ec;
            border-color: #c5dfb4
        }

        .el-button--primary.is-plain:focus,
        .el-button--primary.is-plain:hover {
            background: #6dae43;
            border-color: #6dae43;
            color: #fff
        }

        .el-button--primary.is-plain:active {
            background: #629d3c;
            border-color: #629d3c;
            color: #fff;
            outline: 0
        }

        .el-button--primary.is-plain.is-disabled,
        .el-button--primary.is-plain.is-disabled:active,
        .el-button--primary.is-plain.is-disabled:focus,
        .el-button--primary.is-plain.is-disabled:hover {
            color: #a7ce8e;
            background-color: #f0f7ec;
            border-color: #e2efd9
        }

        .el-button--success {
            color: #fff;
            background-color: #67c23a;
            border-color: #67c23a
        }

        .el-button--success:focus,
        .el-button--success:hover {
            background: #85ce61;
            border-color: #85ce61;
            color: #fff
        }

        .el-button--success.is-active,
        .el-button--success:active {
            background: #5daf34;
            border-color: #5daf34;
            color: #fff
        }

        .el-button--success:active {
            outline: 0
        }

        .el-button--success.is-disabled,
        .el-button--success.is-disabled:active,
        .el-button--success.is-disabled:focus,
        .el-button--success.is-disabled:hover {
            color: #fff;
            background-color: #b3e19d;
            border-color: #b3e19d
        }

        .el-button--success.is-plain {
            color: #67c23a;
            background: #f0f9eb;
            border-color: #c2e7b0
        }

        .el-button--success.is-plain:focus,
        .el-button--success.is-plain:hover {
            background: #67c23a;
            border-color: #67c23a;
            color: #fff
        }

        .el-button--success.is-plain:active {
            background: #5daf34;
            border-color: #5daf34;
            color: #fff;
            outline: 0
        }

        .el-button--success.is-plain.is-disabled,
        .el-button--success.is-plain.is-disabled:active,
        .el-button--success.is-plain.is-disabled:focus,
        .el-button--success.is-plain.is-disabled:hover {
            color: #a4da89;
            background-color: #f0f9eb;
            border-color: #e1f3d8
        }

        .el-button--warning {
            color: #fff;
            background-color: #e6a23c;
            border-color: #e6a23c
        }

        .el-button--warning:focus,
        .el-button--warning:hover {
            background: #ebb563;
            border-color: #ebb563;
            color: #fff
        }

        .el-button--warning.is-active,
        .el-button--warning:active {
            background: #cf9236;
            border-color: #cf9236;
            color: #fff
        }

        .el-button--warning:active {
            outline: 0
        }

        .el-button--warning.is-disabled,
        .el-button--warning.is-disabled:active,
        .el-button--warning.is-disabled:focus,
        .el-button--warning.is-disabled:hover {
            color: #fff;
            background-color: #f3d19e;
            border-color: #f3d19e
        }

        .el-button--warning.is-plain {
            color: #e6a23c;
            background: #fdf6ec;
            border-color: #f5dab1
        }

        .el-button--warning.is-plain:focus,
        .el-button--warning.is-plain:hover {
            background: #e6a23c;
            border-color: #e6a23c;
            color: #fff
        }

        .el-button--warning.is-plain:active {
            background: #cf9236;
            border-color: #cf9236;
            color: #fff;
            outline: 0
        }

        .el-button--warning.is-plain.is-disabled,
        .el-button--warning.is-plain.is-disabled:active,
        .el-button--warning.is-plain.is-disabled:focus,
        .el-button--warning.is-plain.is-disabled:hover {
            color: #f0c78a;
            background-color: #fdf6ec;
            border-color: #faecd8
        }

        .el-button--danger {
            color: #fff;
            background-color: #f56c6c;
            border-color: #f56c6c
        }

        .el-button--danger:focus,
        .el-button--danger:hover {
            background: #f78989;
            border-color: #f78989;
            color: #fff
        }

        .el-button--danger.is-active,
        .el-button--danger:active {
            background: #dd6161;
            border-color: #dd6161;
            color: #fff
        }

        .el-button--danger:active {
            outline: 0
        }

        .el-button--danger.is-disabled,
        .el-button--danger.is-disabled:active,
        .el-button--danger.is-disabled:focus,
        .el-button--danger.is-disabled:hover {
            color: #fff;
            background-color: #fab6b6;
            border-color: #fab6b6
        }

        .el-button--danger.is-plain {
            color: #f56c6c;
            background: #fef0f0;
            border-color: #fbc4c4
        }

        .el-button--danger.is-plain:focus,
        .el-button--danger.is-plain:hover {
            background: #f56c6c;
            border-color: #f56c6c;
            color: #fff
        }

        .el-button--danger.is-plain:active {
            background: #dd6161;
            border-color: #dd6161;
            color: #fff;
            outline: 0
        }

        .el-button--danger.is-plain.is-disabled,
        .el-button--danger.is-plain.is-disabled:active,
        .el-button--danger.is-plain.is-disabled:focus,
        .el-button--danger.is-plain.is-disabled:hover {
            color: #f9a7a7;
            background-color: #fef0f0;
            border-color: #fde2e2
        }

        .el-button--info {
            color: #fff;
            background-color: #909399;
            border-color: #909399
        }

        .el-button--info:focus,
        .el-button--info:hover {
            background: #a6a9ad;
            border-color: #a6a9ad;
            color: #fff
        }

        .el-button--info.is-active,
        .el-button--info:active {
            background: #82848a;
            border-color: #82848a;
            color: #fff
        }

        .el-button--info:active {
            outline: 0
        }

        .el-button--info.is-disabled,
        .el-button--info.is-disabled:active,
        .el-button--info.is-disabled:focus,
        .el-button--info.is-disabled:hover {
            color: #fff;
            background-color: #c8c9cc;
            border-color: #c8c9cc
        }

        .el-button--info.is-plain {
            color: #909399;
            background: #f4f4f5;
            border-color: #d3d4d6
        }

        .el-button--info.is-plain:focus,
        .el-button--info.is-plain:hover {
            background: #909399;
            border-color: #909399;
            color: #fff
        }

        .el-button--info.is-plain:active {
            background: #82848a;
            border-color: #82848a;
            color: #fff;
            outline: 0
        }

        .el-button--info.is-plain.is-disabled,
        .el-button--info.is-plain.is-disabled:active,
        .el-button--info.is-plain.is-disabled:focus,
        .el-button--info.is-plain.is-disabled:hover {
            color: #bcbec2;
            background-color: #f4f4f5;
            border-color: #e9e9eb
        }

        .el-button--medium {
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 4px
        }

        .el-button--medium.is-round {
            padding: 10px 20px
        }

        .el-button--medium.is-circle {
            padding: 10px
        }

        .el-button--small {
            padding: 9px 15px;
            font-size: 12px;
            border-radius: 3px
        }

        .el-button--small.is-round {
            padding: 9px 15px
        }

        .el-button--small.is-circle {
            padding: 9px
        }

        .el-button--mini,
        .el-button--mini.is-round {
            padding: 7px 15px
        }

        .el-button--mini {
            font-size: 12px;
            border-radius: 3px
        }

        .el-button--mini.is-circle {
            padding: 7px
        }

        .el-button--text {
            border-color: transparent;
            color: #6dae43;
            background: 0 0;
            padding-left: 0;
            padding-right: 0
        }

        .el-button--text:focus,
        .el-button--text:hover {
            color: #8abe69;
            border-color: transparent;
            background-color: transparent
        }

        .el-button--text:active {
            color: #629d3c;
            background-color: transparent
        }

        .el-button--text.is-disabled,
        .el-button--text.is-disabled:focus,
        .el-button--text.is-disabled:hover,
        .el-button--text:active {
            border-color: transparent
        }

        .el-button-group .el-button--danger:last-child,
        .el-button-group .el-button--danger:not(:first-child):not(:last-child),
        .el-button-group .el-button--info:last-child,
        .el-button-group .el-button--info:not(:first-child):not(:last-child),
        .el-button-group .el-button--primary:last-child,
        .el-button-group .el-button--primary:not(:first-child):not(:last-child),
        .el-button-group .el-button--success:last-child,
        .el-button-group .el-button--success:not(:first-child):not(:last-child),
        .el-button-group .el-button--warning:last-child,
        .el-button-group .el-button--warning:not(:first-child):not(:last-child),
        .el-button-group>.el-dropdown>.el-button {
            border-left-color: hsla(0, 0%, 100%, .5)
        }

        .el-button-group .el-button--danger:first-child,
        .el-button-group .el-button--danger:not(:first-child):not(:last-child),
        .el-button-group .el-button--info:first-child,
        .el-button-group .el-button--info:not(:first-child):not(:last-child),
        .el-button-group .el-button--primary:first-child,
        .el-button-group .el-button--primary:not(:first-child):not(:last-child),
        .el-button-group .el-button--success:first-child,
        .el-button-group .el-button--success:not(:first-child):not(:last-child),
        .el-button-group .el-button--warning:first-child,
        .el-button-group .el-button--warning:not(:first-child):not(:last-child) {
            border-right-color: hsla(0, 0%, 100%, .5)
        }

        .el-button-group {
            display: inline-block;
            vertical-align: middle
        }

        .el-button-group:after,
        .el-button-group:before {
            display: table
        }

        .el-button-group:after {
            clear: both
        }

        .el-button-group>.el-button {
            float: left;
            position: relative
        }

        .el-button-group>.el-button.is-disabled {
            z-index: 1
        }

        .el-button-group>.el-button:first-child {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .el-button-group>.el-button:last-child {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .el-button-group>.el-button:first-child:last-child {
            border-radius: 4px
        }

        .el-button-group>.el-button:first-child:last-child.is-round {
            border-radius: 20px
        }

        .el-button-group>.el-button:first-child:last-child.is-circle {
            border-radius: 50%
        }

        .el-button-group>.el-button:not(:first-child):not(:last-child) {
            border-radius: 0
        }

        .el-button-group>.el-button.is-active,
        .el-button-group>.el-button:not(.is-disabled):active,
        .el-button-group>.el-button:not(.is-disabled):focus,
        .el-button-group>.el-button:not(.is-disabled):hover {
            z-index: 1
        }

        .el-button-group>.el-dropdown>.el-button {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .el-calendar {
            background-color: #fff
        }

        .el-calendar__header {
            display: flex;
            justify-content: space-between;
            padding: 12px 20px;
            border-bottom: 1px solid #ebeef5
        }

        .el-backtop,
        .el-page-header {
            display: -ms-flexbox
        }

        .el-calendar__title {
            color: #000;
            align-self: center
        }

        .el-calendar__body {
            padding: 12px 20px 35px
        }

        .el-calendar-table {
            table-layout: fixed;
            width: 100%
        }

        .el-calendar-table thead th {
            padding: 12px 0;
            color: #606266;
            font-weight: 400
        }

        .el-calendar-table:not(.is-range) td.next,
        .el-calendar-table:not(.is-range) td.prev {
            color: #c0c4cc
        }

        .el-backtop,
        .el-calendar-table td.is-today {
            color: #6dae43
        }

        .el-calendar-table td {
            border-bottom: 1px solid #ebeef5;
            border-right: 1px solid #ebeef5;
            vertical-align: top;
            transition: background-color .2s ease
        }

        .el-calendar-table td.is-selected {
            background-color: #f2f8fe
        }

        .el-calendar-table tr:first-child td {
            border-top: 1px solid #ebeef5
        }

        .el-calendar-table tr td:first-child {
            border-left: 1px solid #ebeef5
        }

        .el-calendar-table tr.el-calendar-table__row--hide-border td {
            border-top: none
        }

        .el-calendar-table .el-calendar-day {
            box-sizing: border-box;
            padding: 8px;
            height: 85px
        }

        .el-calendar-table .el-calendar-day:hover {
            cursor: pointer;
            background-color: #f2f8fe
        }

        .el-backtop {
            position: fixed;
            background-color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 0 6px rgba(0, 0, 0, .12);
            cursor: pointer;
            z-index: 5
        }

        .el-backtop:hover {
            background-color: #f2f6fc
        }

        .el-page-header {
            display: flex;
            line-height: 24px
        }

        .el-page-header__left {
            display: flex;
            cursor: pointer;
            margin-right: 40px;
            position: relative
        }

        .el-page-header__left:after {
            position: absolute;
            width: 1px;
            height: 16px;
            right: -20px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #dcdfe6
        }

        .el-checkbox,
        .el-checkbox__input {
            display: inline-block;
            position: relative;
            white-space: nowrap
        }

        .el-page-header__left .el-icon-back {
            font-size: 18px;
            margin-right: 6px;
            align-self: center
        }

        .el-page-header__title {
            font-size: 14px;
            font-weight: 500
        }

        .el-page-header__content {
            font-size: 18px;
            color: #303133
        }

        .el-checkbox {
            color: #606266;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            margin-right: 30px
        }

        .el-checkbox.is-bordered {
            padding: 9px 20px 9px 10px;
            border-radius: 4px;
            border: 1px solid #dcdfe6;
            box-sizing: border-box;
            line-height: normal;
            height: 40px
        }

        .el-checkbox.is-bordered.is-checked {
            border-color: #6dae43
        }

        .el-checkbox.is-bordered.is-disabled {
            border-color: #ebeef5;
            cursor: not-allowed
        }

        .el-checkbox.is-bordered.el-checkbox--medium {
            padding: 7px 20px 7px 10px;
            border-radius: 4px;
            height: 36px
        }

        .el-checkbox.is-bordered.el-checkbox--medium .el-checkbox__label {
            line-height: 17px;
            font-size: 14px
        }

        .el-checkbox.is-bordered.el-checkbox--medium .el-checkbox__inner {
            height: 14px;
            width: 14px
        }

        .el-checkbox.is-bordered.el-checkbox--small {
            padding: 5px 15px 5px 10px;
            border-radius: 3px;
            height: 32px
        }

        .el-checkbox.is-bordered.el-checkbox--small .el-checkbox__label {
            line-height: 15px;
            font-size: 12px
        }

        .el-checkbox.is-bordered.el-checkbox--small .el-checkbox__inner {
            height: 12px;
            width: 12px
        }

        .el-checkbox.is-bordered.el-checkbox--small .el-checkbox__inner:after {
            height: 6px;
            width: 2px
        }

        .el-checkbox.is-bordered.el-checkbox--mini {
            padding: 3px 15px 3px 10px;
            border-radius: 3px;
            height: 28px
        }

        .el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__label {
            line-height: 12px;
            font-size: 12px
        }

        .el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__inner {
            height: 12px;
            width: 12px
        }

        .el-checkbox.is-bordered.el-checkbox--mini .el-checkbox__inner:after {
            height: 6px;
            width: 2px
        }

        .el-checkbox__input {
            cursor: pointer;
            outline: 0;
            line-height: 1;
            vertical-align: middle
        }

        .el-checkbox__input.is-disabled .el-checkbox__inner {
            background-color: #edf2fc;
            border-color: #dcdfe6;
            cursor: not-allowed
        }

        .el-checkbox__input.is-disabled .el-checkbox__inner:after {
            cursor: not-allowed;
            border-color: #c0c4cc
        }

        .el-checkbox__input.is-disabled .el-checkbox__inner+.el-checkbox__label {
            cursor: not-allowed
        }

        .el-checkbox__input.is-disabled.is-checked .el-checkbox__inner {
            background-color: #f2f6fc;
            border-color: #dcdfe6
        }

        .el-checkbox__input.is-disabled.is-checked .el-checkbox__inner:after {
            border-color: #c0c4cc
        }

        .el-checkbox__input.is-disabled.is-indeterminate .el-checkbox__inner {
            background-color: #f2f6fc;
            border-color: #dcdfe6
        }

        .el-checkbox__input.is-disabled.is-indeterminate .el-checkbox__inner:before {
            background-color: #c0c4cc;
            border-color: #c0c4cc
        }

        .el-checkbox__input.is-checked .el-checkbox__inner,
        .el-checkbox__input.is-indeterminate .el-checkbox__inner {
            background-color: #6dae43;
            border-color: #6dae43
        }

        .el-checkbox__input.is-disabled+span.el-checkbox__label {
            color: #c0c4cc;
            cursor: not-allowed
        }

        .el-checkbox__input.is-checked .el-checkbox__inner:after {
            transform: rotate(45deg) scaleY(1)
        }

        .el-checkbox__input.is-checked+.el-checkbox__label {
            color: #6dae43
        }

        .el-checkbox__input.is-focus .el-checkbox__inner {
            border-color: #6dae43
        }

        .el-checkbox__input.is-indeterminate .el-checkbox__inner:before {
            content: "";
            position: absolute;
            display: block;
            background-color: #fff;
            height: 2px;
            transform: scale(.5);
            left: 0;
            right: 0;
            top: 5px
        }

        .el-checkbox__input.is-indeterminate .el-checkbox__inner:after {
            display: none
        }

        .el-checkbox__inner {
            display: inline-block;
            position: relative;
            border: 1px solid #dcdfe6;
            border-radius: 2px;
            box-sizing: border-box;
            width: 14px;
            height: 14px;
            background-color: #fff;
            z-index: 1;
            transition: border-color .25s cubic-bezier(.71, -.46, .29, 1.46), background-color .25s cubic-bezier(.71, -.46, .29, 1.46)
        }

        .el-checkbox__inner:hover {
            border-color: #6dae43
        }

        .el-checkbox__inner:after {
            box-sizing: content-box;
            content: "";
            border: 1px solid #fff;
            border-left: 0;
            border-top: 0;
            height: 7px;
            left: 4px;
            position: absolute;
            top: 1px;
            transform: rotate(45deg) scaleY(0);
            width: 3px;
            transition: transform .15s ease-in .05s;
            transform-origin: center
        }

        .el-checkbox__original {
            opacity: 0;
            outline: 0;
            position: absolute;
            margin: 0;
            width: 0;
            height: 0;
            z-index: -1
        }

        .el-checkbox-button,
        .el-checkbox-button__inner {
            display: inline-block;
            position: relative
        }

        .el-checkbox__label {
            display: inline-block;
            padding-left: 10px;
            line-height: 19px;
            font-size: 14px
        }

        .el-checkbox:last-of-type {
            margin-right: 0
        }

        .el-checkbox-button__inner {
            line-height: 1;
            font-weight: 500;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            background: #fff;
            border: 1px solid #dcdfe6;
            border-left: 0;
            color: #606266;
            -webkit-appearance: none;
            text-align: center;
            box-sizing: border-box;
            outline: 0;
            margin: 0;
            transition: all .3s cubic-bezier(.645, .045, .355, 1);
            padding: 12px 20px;
            font-size: 14px;
            border-radius: 0
        }

        .el-checkbox-button__inner.is-round {
            padding: 12px 20px
        }

        .el-checkbox-button__inner:hover {
            color: #6dae43
        }

        .el-checkbox-button__inner [class*=el-icon-] {
            line-height: .9
        }

        .el-checkbox-button__inner [class*=el-icon-]+span {
            margin-left: 5px
        }

        .el-checkbox-button__original {
            opacity: 0;
            outline: 0;
            position: absolute;
            margin: 0;
            z-index: -1
        }

        .el-radio,
        .el-radio__inner,
        .el-radio__input {
            position: relative;
            display: inline-block
        }

        .el-checkbox-button.is-checked .el-checkbox-button__inner {
            color: #fff;
            background-color: #6dae43;
            border-color: #6dae43;
            box-shadow: -1px 0 0 0 #a7ce8e
        }

        .el-checkbox-button.is-checked:first-child .el-checkbox-button__inner {
            border-left-color: #6dae43
        }

        .el-checkbox-button.is-disabled .el-checkbox-button__inner {
            color: #c0c4cc;
            cursor: not-allowed;
            background-image: none;
            background-color: #fff;
            border-color: #ebeef5;
            box-shadow: none
        }

        .el-checkbox-button.is-disabled:first-child .el-checkbox-button__inner {
            border-left-color: #ebeef5
        }

        .el-checkbox-button:first-child .el-checkbox-button__inner {
            border-left: 1px solid #dcdfe6;
            border-radius: 4px 0 0 4px;
            box-shadow: none !important
        }

        .el-checkbox-button.is-focus .el-checkbox-button__inner {
            border-color: #6dae43
        }

        .el-checkbox-button:last-child .el-checkbox-button__inner {
            border-radius: 0 4px 4px 0
        }

        .el-checkbox-button--medium .el-checkbox-button__inner {
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 0
        }

        .el-checkbox-button--medium .el-checkbox-button__inner.is-round {
            padding: 10px 20px
        }

        .el-checkbox-button--small .el-checkbox-button__inner {
            padding: 9px 15px;
            font-size: 12px;
            border-radius: 0
        }

        .el-checkbox-button--small .el-checkbox-button__inner.is-round {
            padding: 9px 15px
        }

        .el-checkbox-button--mini .el-checkbox-button__inner {
            padding: 7px 15px;
            font-size: 12px;
            border-radius: 0
        }

        .el-checkbox-button--mini .el-checkbox-button__inner.is-round {
            padding: 7px 15px
        }

        .el-checkbox-group {
            font-size: 0
        }

        .el-avatar,
        .el-cascader-panel,
        .el-radio,
        .el-radio--medium.is-bordered .el-radio__label,
        .el-radio__label {
            font-size: 14px
        }

        .el-radio {
            color: #606266;
            font-weight: 500;
            line-height: 1;
            cursor: pointer;
            white-space: nowrap;
            outline: 0;
            margin-right: 30px
        }

        .el-cascader-node>.el-radio,
        .el-radio:last-child {
            margin-right: 0
        }

        .el-radio.is-bordered {
            padding: 12px 20px 0 10px;
            border-radius: 4px;
            border: 1px solid #dcdfe6;
            box-sizing: border-box;
            height: 40px
        }

        .el-cascader-menu,
        .el-cascader-menu__list,
        .el-radio.is-bordered,
        .el-radio__inner {
            -webkit-box-sizing: border-box
        }

        .el-radio.is-bordered.is-checked {
            border-color: #6dae43
        }

        .el-radio.is-bordered.is-disabled {
            cursor: not-allowed;
            border-color: #ebeef5
        }

        .el-radio__input.is-disabled .el-radio__inner,
        .el-radio__input.is-disabled.is-checked .el-radio__inner {
            background-color: #f5f7fa;
            border-color: #e4e7ed
        }

        .el-radio.is-bordered+.el-radio.is-bordered {
            margin-left: 10px
        }

        .el-radio--medium.is-bordered {
            padding: 10px 20px 0 10px;
            border-radius: 4px;
            height: 36px
        }

        .el-radio--mini.is-bordered .el-radio__label,
        .el-radio--small.is-bordered .el-radio__label {
            font-size: 12px
        }

        .el-radio--medium.is-bordered .el-radio__inner {
            height: 14px;
            width: 14px
        }

        .el-radio--small.is-bordered {
            padding: 8px 15px 0 10px;
            border-radius: 3px;
            height: 32px
        }

        .el-radio--small.is-bordered .el-radio__inner {
            height: 12px;
            width: 12px
        }

        .el-radio--mini.is-bordered {
            padding: 6px 15px 0 10px;
            border-radius: 3px;
            height: 28px
        }

        .el-radio--mini.is-bordered .el-radio__inner {
            height: 12px;
            width: 12px
        }

        .el-radio__input {
            white-space: nowrap;
            cursor: pointer;
            outline: 0;
            line-height: 1;
            vertical-align: middle
        }

        .el-radio__input.is-disabled .el-radio__inner {
            cursor: not-allowed
        }

        .el-radio__input.is-disabled .el-radio__inner:after {
            cursor: not-allowed;
            background-color: #f5f7fa
        }

        .el-radio__input.is-disabled .el-radio__inner+.el-radio__label {
            cursor: not-allowed
        }

        .el-radio__input.is-disabled.is-checked .el-radio__inner:after {
            background-color: #c0c4cc
        }

        .el-radio__input.is-disabled+span.el-radio__label {
            color: #c0c4cc;
            cursor: not-allowed
        }

        .el-radio__input.is-checked .el-radio__inner {
            border-color: #6dae43;
            background: #6dae43
        }

        .el-radio__input.is-checked .el-radio__inner:after {
            transform: translate(-50%, -50%) scale(1)
        }

        .el-radio__input.is-checked+.el-radio__label {
            color: #6dae43
        }

        .el-radio__input.is-focus .el-radio__inner {
            border-color: #6dae43
        }

        .el-radio__inner {
            border: 1px solid #dcdfe6;
            border-radius: 100%;
            width: 14px;
            height: 14px;
            background-color: #fff;
            cursor: pointer;
            box-sizing: border-box
        }

        .el-radio__inner:hover {
            border-color: #6dae43
        }

        .el-radio__inner:after {
            width: 4px;
            height: 4px;
            border-radius: 100%;
            background-color: #fff;
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform .15s ease-in
        }

        .el-radio__original {
            opacity: 0;
            outline: 0;
            position: absolute;
            z-index: -1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: 0
        }

        .el-radio:focus:not(.is-focus):not(:active):not(.is-disabled) .el-radio__inner {
            box-shadow: 0 0 2px 2px #6dae43
        }

        .el-radio__label {
            padding-left: 10px
        }

        .el-scrollbar {
            overflow: hidden;
            position: relative
        }

        .el-scrollbar:active>.el-scrollbar__bar,
        .el-scrollbar:focus>.el-scrollbar__bar,
        .el-scrollbar:hover>.el-scrollbar__bar {
            opacity: 1;
            transition: opacity .34s ease-out
        }

        .el-scrollbar__wrap {
            overflow: scroll;
            height: 100%
        }

        .el-scrollbar__wrap--hidden-default {
            scrollbar-width: none
        }

        .el-scrollbar__wrap--hidden-default::-webkit-scrollbar {
            width: 0;
            height: 0
        }

        .el-scrollbar__thumb {
            position: relative;
            display: block;
            width: 0;
            height: 0;
            cursor: pointer;
            border-radius: inherit;
            background-color: rgba(144, 147, 153, .3);
            transition: background-color .3s
        }

        .el-scrollbar__thumb:hover {
            background-color: rgba(144, 147, 153, .5)
        }

        .el-scrollbar__bar {
            position: absolute;
            right: 2px;
            bottom: 2px;
            z-index: 1;
            border-radius: 4px;
            opacity: 0;
            transition: opacity .12s ease-out
        }

        .el-scrollbar__bar.is-vertical {
            width: 6px;
            top: 2px
        }

        .el-scrollbar__bar.is-vertical>div {
            width: 100%
        }

        .el-scrollbar__bar.is-horizontal {
            height: 6px;
            left: 2px
        }

        .el-scrollbar__bar.is-horizontal>div {
            height: 100%
        }

        .el-cascader-panel {
            display: flex;
            border-radius: 4px
        }

        .el-cascader-panel.is-bordered {
            border: 1px solid #e4e7ed;
            border-radius: 4px
        }

        .el-cascader-menu {
            min-width: 180px;
            box-sizing: border-box;
            color: #606266;
            border-right: 1px solid #e4e7ed
        }

        .el-cascader-menu:last-child {
            border-right: none
        }

        .el-cascader-menu__wrap {
            height: 204px
        }

        .el-cascader-menu__list {
            position: relative;
            min-height: 100%;
            margin: 0;
            padding: 6px 0;
            list-style: none;
            box-sizing: border-box
        }

        .el-cascader-menu__hover-zone {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none
        }

        .el-cascader-menu__empty-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #c0c4cc
        }

        .el-cascader-node {
            position: relative;
            display: flex;
            align-items: center;
            padding: 0 30px 0 20px;
            height: 34px;
            line-height: 34px;
            outline: 0
        }

        .el-cascader-node.is-selectable.in-active-path {
            color: #606266
        }

        .el-cascader-node.in-active-path,
        .el-cascader-node.is-active,
        .el-cascader-node.is-selectable.in-checked-path {
            color: #6dae43;
            font-weight: 700
        }

        .el-cascader-node:not(.is-disabled) {
            cursor: pointer
        }

        .el-cascader-node:not(.is-disabled):focus,
        .el-cascader-node:not(.is-disabled):hover {
            background: #f5f7fa
        }

        .el-cascader-node.is-disabled {
            color: #c0c4cc;
            cursor: not-allowed
        }

        .el-cascader-node__prefix {
            position: absolute;
            left: 10px
        }

        .el-cascader-node__postfix {
            position: absolute;
            right: 10px
        }

        .el-cascader-node__label {
            flex: 1;
            padding: 0 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis
        }

        .el-cascader-node>.el-radio .el-radio__label {
            padding-left: 0
        }

        .el-avatar {
            display: inline-block;
            box-sizing: border-box;
            text-align: center;
            overflow: hidden;
            color: #fff;
            background: #c0c4cc;
            width: 40px;
            height: 40px;
            line-height: 40px
        }

        .el-avatar,
        .el-drawer,
        .el-drawer__body>* {
            -webkit-box-sizing: border-box
        }

        .el-avatar>img {
            display: block;
            height: 100%;
            vertical-align: middle
        }

        .el-empty__image img,
        .el-empty__image svg {
            vertical-align: top;
            height: 100%;
            width: 100%
        }

        .el-avatar--circle {
            border-radius: 50%
        }

        .el-avatar--square {
            border-radius: 4px
        }

        .el-avatar--icon {
            font-size: 18px
        }

        .el-avatar--large {
            width: 40px;
            height: 40px;
            line-height: 40px
        }

        .el-avatar--medium {
            width: 36px;
            height: 36px;
            line-height: 36px
        }

        .el-avatar--small {
            width: 28px;
            height: 28px;
            line-height: 28px
        }

        @keyframes el-drawer-fade-in {
            0% {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @keyframes rtl-drawer-in {
            0% {
                transform: translate(100%)
            }

            to {
                transform: translate(0)
            }
        }

        @keyframes rtl-drawer-out {
            0% {
                transform: translate(0)
            }

            to {
                transform: translate(100%)
            }
        }

        @keyframes ltr-drawer-in {
            0% {
                transform: translate(-100%)
            }

            to {
                transform: translate(0)
            }
        }

        @keyframes ltr-drawer-out {
            0% {
                transform: translate(0)
            }

            to {
                transform: translate(-100%)
            }
        }

        @keyframes ttb-drawer-in {
            0% {
                transform: translateY(-100%)
            }

            to {
                transform: translate(0)
            }
        }

        @keyframes ttb-drawer-out {
            0% {
                transform: translate(0)
            }

            to {
                transform: translateY(-100%)
            }
        }

        @keyframes btt-drawer-in {
            0% {
                transform: translateY(100%)
            }

            to {
                transform: translate(0)
            }
        }

        @keyframes btt-drawer-out {
            0% {
                transform: translate(0)
            }

            to {
                transform: translateY(100%)
            }
        }

        .el-drawer {
            position: absolute;
            box-sizing: border-box;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            box-shadow: 0 8px 10px -5px rgba(0, 0, 0, .2), 0 16px 24px 2px rgba(0, 0, 0, .14), 0 6px 30px 5px rgba(0, 0, 0, .12);
            overflow: hidden;
            outline: 0
        }

        .el-drawer.rtl {
            animation: rtl-drawer-out .3s;
            right: 0
        }

        .el-drawer__open .el-drawer.rtl {
            animation: rtl-drawer-in .3s 1ms
        }

        .el-drawer.ltr {
            animation: ltr-drawer-out .3s;
            left: 0
        }

        .el-drawer__open .el-drawer.ltr {
            animation: ltr-drawer-in .3s 1ms
        }

        .el-drawer.ttb {
            animation: ttb-drawer-out .3s;
            top: 0
        }

        .el-drawer__open .el-drawer.ttb {
            animation: ttb-drawer-in .3s 1ms
        }

        .el-drawer.btt {
            animation: btt-drawer-out .3s;
            bottom: 0
        }

        .el-drawer__open .el-drawer.btt {
            animation: btt-drawer-in .3s 1ms
        }

        .el-drawer__wrapper {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: hidden;
            margin: 0
        }

        .el-drawer__header {
            align-items: center;
            color: #72767b;
            display: flex;
            margin-bottom: 32px;
            padding: 20px 20px 0
        }

        .el-drawer__header>:first-child,
        .el-drawer__title {
            flex: 1
        }

        .el-drawer__title {
            margin: 0;
            line-height: inherit;
            font-size: 1rem
        }

        .el-drawer__close-btn {
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: inherit;
            background-color: transparent
        }

        .el-drawer__body {
            flex: 1;
            overflow: auto
        }

        .el-popconfirm__main,
        .el-skeleton__image {
            display: -ms-flexbox;
            -webkit-box-align: center;
            display: -webkit-box
        }

        .el-drawer__body>* {
            box-sizing: border-box
        }

        .el-drawer.ltr,
        .el-drawer.rtl {
            height: 100%;
            top: 0;
            bottom: 0
        }

        .el-drawer.btt,
        .el-drawer.ttb,
        .el-drawer__container {
            width: 100%;
            left: 0;
            right: 0
        }

        .el-drawer__container {
            position: relative;
            top: 0;
            bottom: 0;
            height: 100%
        }

        .el-drawer-fade-enter-active {
            animation: el-drawer-fade-in .3s
        }

        .el-drawer-fade-leave-active {
            animation: el-drawer-fade-in .3s reverse
        }

        .el-popconfirm__main {
            display: flex;
            align-items: center
        }

        .el-popconfirm__icon {
            margin-right: 5px
        }

        .el-popconfirm__action {
            text-align: right;
            margin: 0
        }

        @keyframes el-skeleton-loading {
            0% {
                background-position: 100% 50%
            }

            to {
                background-position: 0 50%
            }
        }

        .el-skeleton {
            width: 100%
        }

        .el-skeleton__first-line,
        .el-skeleton__paragraph {
            height: 16px;
            margin-top: 16px;
            background: #f2f2f2
        }

        .el-skeleton.is-animated .el-skeleton__item {
            background: linear-gradient(90deg, #f2f2f2 25%, #e6e6e6 37%, #f2f2f2 63%);
            background-size: 400% 100%;
            animation: el-skeleton-loading 1.4s ease infinite
        }

        .el-skeleton__item {
            background: #f2f2f2;
            display: inline-block;
            height: 16px;
            border-radius: 4px;
            width: 100%
        }

        .el-skeleton__circle {
            border-radius: 50%;
            width: 36px;
            height: 36px;
            line-height: 36px
        }

        .el-skeleton__circle--lg {
            width: 40px;
            height: 40px;
            line-height: 40px
        }

        .el-skeleton__circle--md {
            width: 28px;
            height: 28px;
            line-height: 28px
        }

        .el-skeleton__button {
            height: 40px;
            width: 64px;
            border-radius: 4px
        }

        .el-skeleton__p {
            width: 100%
        }

        .el-skeleton__p.is-last {
            width: 61%
        }

        .el-skeleton__p.is-first {
            width: 33%
        }

        .el-skeleton__text {
            width: 100%;
            height: 13px
        }

        .el-skeleton__caption {
            height: 12px
        }

        .el-skeleton__h1 {
            height: 20px
        }

        .el-skeleton__h3 {
            height: 18px
        }

        .el-skeleton__h5 {
            height: 16px
        }

        .el-skeleton__image {
            width: unset;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0
        }

        .el-skeleton__image svg {
            fill: #dcdde0;
            width: 22%;
            height: 22%
        }

        .el-empty {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            box-sizing: border-box;
            padding: 40px 0
        }

        .el-empty__image {
            width: 160px
        }

        .el-empty__image img {
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            -o-object-fit: contain;
            object-fit: contain
        }

        .el-empty__image svg {
            fill: #dcdde0
        }

        .el-empty__description {
            margin-top: 20px
        }

        .el-empty__description p {
            margin: 0;
            font-size: 14px;
            color: #909399
        }

        .el-empty__bottom,
        .el-result__title {
            margin-top: 20px
        }

        .el-descriptions {
            box-sizing: border-box;
            font-size: 14px;
            color: #303133
        }

        .el-descriptions__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px
        }

        .el-descriptions__title {
            font-size: 16px;
            font-weight: 700
        }

        .el-descriptions--mini,
        .el-descriptions--small {
            font-size: 12px
        }

        .el-descriptions__body {
            color: #606266;
            background-color: #fff
        }

        .el-descriptions__body .el-descriptions__table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed
        }

        .el-descriptions__body .el-descriptions__table .el-descriptions-item__cell {
            box-sizing: border-box;
            text-align: left;
            font-weight: 400;
            line-height: 1.5
        }

        .el-descriptions__body .el-descriptions__table .el-descriptions-item__cell.is-left {
            text-align: left
        }

        .el-descriptions__body .el-descriptions__table .el-descriptions-item__cell.is-center {
            text-align: center
        }

        .el-descriptions__body .el-descriptions__table .el-descriptions-item__cell.is-right {
            text-align: right
        }

        .el-descriptions .is-bordered {
            table-layout: auto
        }

        .el-descriptions .is-bordered .el-descriptions-item__cell {
            border: 1px solid #ebeef5;
            padding: 12px 10px
        }

        .el-descriptions :not(.is-bordered) .el-descriptions-item__cell {
            padding-bottom: 12px
        }

        .el-descriptions--medium.is-bordered .el-descriptions-item__cell {
            padding: 10px
        }

        .el-descriptions--medium:not(.is-bordered) .el-descriptions-item__cell {
            padding-bottom: 10px
        }

        .el-descriptions--small.is-bordered .el-descriptions-item__cell {
            padding: 8px 10px
        }

        .el-descriptions--small:not(.is-bordered) .el-descriptions-item__cell {
            padding-bottom: 8px
        }

        .el-descriptions--mini.is-bordered .el-descriptions-item__cell {
            padding: 6px 10px
        }

        .el-descriptions--mini:not(.is-bordered) .el-descriptions-item__cell {
            padding-bottom: 6px
        }

        .el-descriptions-item {
            vertical-align: top
        }

        .el-descriptions-item__container {
            display: flex
        }

        .el-descriptions-item__container .el-descriptions-item__content,
        .el-descriptions-item__container .el-descriptions-item__label {
            display: inline-flex;
            align-items: baseline
        }

        .el-descriptions-item__container .el-descriptions-item__content {
            flex: 1
        }

        .el-descriptions-item__label.has-colon:after {
            content: ":";
            position: relative;
            top: -.5px
        }

        .el-descriptions-item__label.is-bordered-label {
            font-weight: 700;
            color: #909399;
            background: #fafafa
        }

        .el-descriptions-item__label:not(.is-bordered-label) {
            margin-right: 10px
        }

        .el-descriptions-item__content {
            word-break: break-word;
            overflow-wrap: break-word
        }

        .el-result {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            box-sizing: border-box;
            padding: 40px 30px
        }

        .el-result__icon svg {
            width: 64px;
            height: 64px
        }

        .el-result__title p {
            margin: 0;
            font-size: 20px;
            color: #303133;
            line-height: 1.3
        }

        .el-result__subtitle {
            margin-top: 10px
        }

        .el-result__subtitle p {
            margin: 0;
            font-size: 14px;
            color: #606266;
            line-height: 1.3
        }

        .el-result__extra {
            margin-top: 30px
        }

        .el-result .icon-success {
            fill: #67c23a
        }

        .el-result .icon-error {
            fill: #f56c6c
        }

        .el-result .icon-info {
            fill: #909399
        }

        .el-result .icon-warning {
            fill: #e6a23c
        }

        /*purgecss end ignore*/
        /*purgecss start ignore*/

        .flex-row-center {
            display: flex;
            flex-direction: row;
            align-items: center
        }

        .text-title-block {
            font-size: 1.25rem;
            line-height: 1.5rem;
            font-weight: 500;
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity))
        }

        .text-view-all {
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 400;
            --tw-text-opacity: 1;
            color: rgba(250, 87, 62, var(--tw-text-opacity))
        }

        .text-view-all:hover {
            text-decoration: underline
        }

        .wh-full {
            height: 100%;
            width: 100%
        }

        .grid-center {
            display: grid;
            place-items: center
        }

        .border-b-neutral-600 {
            border-bottom-width: 2px;
            border-style: solid;
            --tw-border-opacity: 1;
            border-color: rgba(246, 246, 246, var(--tw-border-opacity));
            padding-bottom: 0.625rem
        }

        .absolute-full {
            position: absolute;
            top: 0px;
            left: 0px;
            height: 100%;
            width: 100%
        }

        .border-all-neutral-aaa {
            border-width: 1px;
            border-style: solid;
            --tw-border-opacity: 1;
            border-color: rgba(170, 170, 170, var(--tw-border-opacity))
        }

        .border-all-error {
            border-width: 1px;
            border-style: solid;
            --tw-border-opacity: 1;
            border-color: rgba(255, 59, 48, var(--tw-border-opacity))
        }

        .container-input-auth {
            height: 2.5rem;
            width: 100%;
            border-radius: 9999px;
            --tw-bg-opacity: 1;
            background-color: rgba(241, 241, 241, var(--tw-bg-opacity));
            padding-left: 0.75rem;
            padding-right: 0.75rem
        }

        @media (min-width: 640px) {
            .container-input-auth {
                padding-left: 1.125rem;
                padding-right: 1.125rem
            }
        }

        .container-input-auth {
            display: flex;
            flex-direction: row;
            align-items: center
        }

        .input-auth {
            height: 100%;
            width: 100%;
            border-style: none;
            background-color: transparent;
            background-image: none;
            font-size: 0.875rem;
            line-height: 1rem;
            --tw-text-opacity: 1;
            color: rgba(34, 34, 34, var(--tw-text-opacity))
        }

        .input-auth::-moz-placeholder {
            --tw-placeholder-opacity: 1;
            color: rgba(153, 153, 153, var(--tw-placeholder-opacity))
        }

        .input-auth::placeholder {
            --tw-placeholder-opacity: 1;
            color: rgba(153, 153, 153, var(--tw-placeholder-opacity))
        }

        .container-input-profile {
            height: 2.5rem;
            height: 2.5rem;
            width: 100%;
            border-radius: 9999px;
            border-width: 0px;
            --tw-bg-opacity: 1;
            background-color: rgba(241, 241, 241, var(--tw-bg-opacity));
            padding-left: 1.125rem;
            padding-right: 1.125rem;
            display: flex;
            flex-direction: row;
            align-items: center
        }

        .input-profile {
            height: 100%;
            width: 100%;
            border-style: none;
            background-color: transparent;
            font-size: 1rem;
            line-height: 1.25rem;
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity))
        }

        .text-normal-default {
            font-size: 0.875rem;
            line-height: 1rem;
            font-weight: 400;
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity))
        }

        .text-medium-default {
            font-size: 0.875rem;
            line-height: 1rem;
            font-weight: 500;
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity))
        }

        .text-normal-neutral {
            font-size: 0.875rem;
            line-height: 1rem;
            font-weight: 400;
            --tw-text-opacity: 1;
            color: rgba(34, 34, 34, var(--tw-text-opacity))
        }

        /*purgecss end ignore*/
        /*purgecss start ignore*/

        .dialog-common {
            width: calc(100vw - 4rem) !important;
            background: #fff !important;
            box-shadow: 0 4px 5px rgba(0, 0, 0, .1) !important;
            border-radius: 12px !important;
            position: relative !important
        }

        .dialog-common .el-dialog__header {
            padding: 0 !important
        }

        .dialog-common .el-dialog__body {
            padding: 0 !important;
            word-break: break-word
        }

        .dialog-common-wap {
            width: 100vw !important;
            height: 100vh !important;
            background: #fff !important;
            position: relative !important;
            margin: 0 !important
        }

        .dialog-common-wap .el-dialog__header {
            padding: 0 !important
        }

        .dialog-common-wap .el-dialog__body {
            padding: 0 !important;
            word-break: break-word
        }

        .dialog-auth {
            max-width: 344px !important
        }

        .contain-input {
            border: 1px solid #aaa;
            height: 48px
        }

        .contain-input .input-common {
            background: none;
            border: none;
            font-size: 15px;
            line-height: 20px;
            color: #000
        }

        .contain-input .input-common::-moz-placeholder {
            color: #aaa
        }

        .contain-input .input-common::placeholder {
            color: #aaa
        }

        .item-icon-fm {
            width: 3rem;
            height: 3rem;
            margin-right: 1.5rem
        }

        .item-icon-fm:nth-child(4n) {
            margin-right: 0
        }

        @media(min-width:1024px) {
            .item-icon-fm {
                width: 6.25rem;
                height: 6.25rem;
                margin-right: 2.5rem
            }

            .item-icon-fm:nth-child(6n) {
                margin-right: 0
            }
        }

        @media(min-width:320px) {
            .input-content .el-textarea__inner {
                background: #f1f1f1;
                border-radius: 22px;
                height: 120px !important;
                font-size: 14px;
                line-height: 16px;
                color: #000;
                padding: 12px 16px 30px !important;
                border: none !important;
                resize: none
            }

            .input-content .el-textarea__inner::-moz-placeholder {
                color: #aaa
            }

            .input-content .el-textarea__inner::placeholder {
                color: #aaa
            }

            .input-content .el-input__count {
                font-size: 14px;
                line-height: 16px;
                text-align: right;
                color: #222 !important;
                background: transparent
            }
        }

        @media(min-width:1024px) {
            .input-content .el-textarea__inner {
                font-size: 15px;
                line-height: 18px;
                background: #f6f6f6;
                border-radius: 8px;
                font-size: 14px;
                line-height: 16px;
                color: #000;
                padding: 12px 16px 30px !important;
                border: none !important;
                resize: none
            }

            .input-content .el-textarea__inner::-moz-placeholder {
                color: #aaa
            }

            .input-content .el-textarea__inner::placeholder {
                color: #aaa
            }

            .input-content .el-input__count {
                font-size: 14px;
                line-height: 16px;
                text-align: right;
                color: #222 !important;
                background: transparent
            }
        }

        .loading-fullscreen .el-icon-loading {
            font-size: 40px !important;
            animation: rotating 1s linear infinite !important
        }

        .loading-fullscreen .el-icon-loading:before {
            color: #fa573e !important
        }

        input:-webkit-autofill,
        input:-webkit-autofill:focus {
            -webkit-transition: background-color 600000s 0s, color 600000s 0s;
            transition: background-color 600000s 0s, color 600000s 0s
        }

        .input-auth:focus,
        .input-auth:focus-visible {
            background: inherit;
            border: inherit;
            outline: inherit
        }

        .notify-item {
            background: rgba(0, 0, 0, .8) !important;
            border-radius: 24px;
            width: -moz-max-content !important;
            width: max-content !important;
            height: 48px;
            padding: 0 20px !important;
            border: none !important;
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            z-index: 99999999999 !important
        }

        .notify-item .el-notification__group {
            display: flex;
            flex-direction: row;
            align-items: center
        }

        .notify-item .el-notification__title {
            font-size: 16px !important;
            line-height: 20px !important;
            color: #fff !important
        }

        .notify-item .el-icon-success {
            color: #fff !important
        }

        .notify-item .el-icon-success:before {
            content: "" !important
        }

        .animate-spin-thumb {
            animation: spinLoading 5s linear infinite
        }

        .nth-last-mr-15 {
            margin-right: 3.875rem
        }

        .nth-last-mr-15:last-child {
            margin-right: 0
        }

        .nth-last-mr-1 {
            margin-right: .875rem
        }

        .nth-last-mr-1:last-child {
            margin-right: 0
        }

        .nth-4th-mr-6 {
            margin-right: 1.5rem;
            margin-bottom: 0
        }

        .nth-4th-mr-6:nth-child(4n+4) {
            margin-right: 0
        }

        .nth-4th-mr-6:nth-last-child(n+4) {
            margin-bottom: 1.5rem
        }

        .input-date-picker {
            width: 100% !important
        }

        .input-date-picker .el-input__inner {
            background: none !important;
            border: none !important;
            color: #222 !important;
            padding-left: 16px !important
        }

        .storybook-author-info-wrap .main-action {
            justify-content: center
        }

        .storybook-author-info-wrap .author-name {
            font-weight: 700;
            font-size: 24px;
            line-height: 28px;
            color: #222;
            margin-bottom: 22px;
            margin-top: 12px;
            text-align: center
        }

        .storybook-author-info-wrap .author-name:hover {
            color: #6dae43
        }

        .storybook-author-info-wrap .author-des {
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            text-align: justify;
            color: #222
        }

        .storybook-author-info-wrap .author-des:not(.is-readmore) {
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 20px;
            -webkit-line-clamp: 5;
            max-height: 100px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            visibility: visible
        }

        .storybook-author-info-wrap .action-show-more-wrap .action-show-item {
            margin-top: 12px;
            cursor: pointer;
            text-align: center;
            font-size: 14px;
            line-height: 16px;
            color: #999
        }

        @media(min-width:1024px)and (max-width:1279px) {
            .bg-container {
                width: 95%;
                min-width: 1000px
            }

            .bg-sidebar-left {
                width: 260px
            }
        }

        @media(min-width:1280px)and (max-width:1537px) {
            .bg-container {
                width: 90%;
                min-width: 1152px
            }

            .bg-sidebar-left {
                width: 310px
            }
        }

        @media(min-width:1536px)and (max-width:1919px) {
            .bg-container {
                width: 90%;
                min-width: 1384px
            }

            .bg-sidebar-left {
                width: 375px
            }
        }

        @media(max-width:1635px) {
            .nth-author {
                width: calc(20% - 1.8rem);
                margin-right: 2.25rem;
                margin-bottom: 1.875rem
            }

            .nth-author:nth-child(5n+5) {
                margin-right: 0
            }
        }

        @media(min-width:1636px) {
            .nth-author {
                width: calc(16.66667% - 1.875rem);
                margin-right: 2.25rem;
                margin-bottom: 1.875rem
            }

            .nth-author:nth-child(6n+6) {
                margin-right: 0
            }
        }

        @media(min-width:1920px) {
            .bg-container {
                width: 1580px
            }

            .bg-sidebar-left {
                width: 390px
            }
        }

        .fm-t-ellipsis-1 {
            -webkit-line-clamp: 1 !important
        }

        .fm-t-ellipsis-1,
        .fm-t-ellipsis-2 {
            -webkit-box-orient: vertical !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            display: -webkit-box !important;
            word-break: break-word;
            white-space: normal
        }

        .fm-t-ellipsis-2 {
            -webkit-line-clamp: 2 !important
        }

        .fm-t-ellipsis-3,
        .fm-t-ellipsis-4 {
            -webkit-line-clamp: 3 !important
        }

        .fm-t-ellipsis-3,
        .fm-t-ellipsis-4,
        .fm-t-ellipsis-5 {
            -webkit-box-orient: vertical !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            display: -webkit-box !important;
            word-break: break-word;
            white-space: normal
        }

        .fm-t-ellipsis-5 {
            -webkit-line-clamp: 5 !important
        }

        .fm-t-ellipsis-6 {
            -webkit-line-clamp: 6 !important
        }

        .fm-t-ellipsis-6,
        .fm-t-ellipsis-8 {
            -webkit-box-orient: vertical !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            display: -webkit-box !important;
            word-break: break-word;
            white-space: normal
        }

        .fm-t-ellipsis-8 {
            -webkit-line-clamp: 8 !important
        }

        .outline-0:focus-visible {
            outline: none
        }

        .nth-2th-mr-7-5 {
            width: calc(50% - .9375rem);
            margin-right: 1.875rem;
            margin-bottom: 1.875rem
        }

        .nth-2th-mr-7-5:nth-child(2n+2) {
            margin-right: 0
        }

        .\!cursor-text {
            cursor: text !important
        }

        .\!w-max {
            width: -moz-max-content !important;
            width: max-content !important
        }

        .book-item {
            cursor: pointer
        }

        .book-item .storybook-image-box {
            position: relative;
            border-radius: 6px;
            overflow: hidden
        }

        .book-item .storybook-image-box .image img {
            display: block;
            background-color: #f1f1f1;
            width: 100% !important;
            height: 100% !important;
            border-radius: 6px
        }

        .book-item .storybook-image-box .layer-view-detail-book {
            display: none;
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1111;
            background: rgba(0, 0, 0, .2);
            width: 100% !important;
            height: 100% !important;
            border-radius: 6px
        }

        .book-item .storybook-image-box .layer-view-detail-book>.image-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 45px;
            height: 45px
        }

        .book-item .storybook-image-box .layer-view-detail-book>.image-box:hover img.image-read {
            display: none
        }

        .book-item .storybook-image-box .layer-view-detail-book>.image-box:hover img.image-read-active {
            display: block
        }

        .book-item .storybook-image-box .layer-view-detail-book img {
            width: 45px;
            height: 45px;
            border-radius: 50%
        }

        .book-item .storybook-image-box .layer-view-detail-book img.image-read-active {
            display: none
        }

        .book-item .storybook-image-box:hover .layer-view-detail-book {
            display: block
        }

        .book-item__title a {
            margin-top: 12px;
            height: 36px;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 18px;
            -webkit-line-clamp: 2;
            max-height: 36px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            visibility: visible
        }

        .book-item:hover .storybook-view-3__title {
            color: #6dae43
        }

        .book-item .image img {
            display: block;
            background-color: #f1f1f1;
            border-radius: 6px
        }

        .book-item .image img,
        .book-item .layer-view-detail-book {
            width: 100% !important;
            height: 100% !important
        }

        .score-message em {
            color: #6dae43;
            font-weight: 700;
            font-style: normal
        }

        .el-loading-mask.is-fullscreen {
            position: fixed;
            z-index: 10 !important
        }

        .el-loading-mask {
            width: 100vw;
            height: 100vh;
            position: fixed !important
        }

        .el-loading-mask .el-loading-spinner i {
            font-size: 40px !important
        }

        .el-loading-mask .el-loading-text {
            display: none
        }

        .el-loading-mask .el-icon-loading {
            animation: rotating 1s linear infinite !important
        }

        .py-15px {
            padding-top: 15px;
            padding-bottom: 15px
        }

        .hover-primary-color:hover,
        .text-primary-color {
            color: #6dae43
        }

        .text-black-primary {
            color: #222
        }

        .bg-primary-color {
            background: #6dae43
        }

        .bg-primary-15 {
            background: rgba(109, 174, 67, .15)
        }

        .mb-30px {
            margin-bottom: 30px
        }

        .text-size-18px {
            font-size: 18px
        }

        .py-14 {
            padding-top: 14px;
            padding-bottom: 14px
        }

        .leading-20px {
            line-height: 20px
        }

        .mx-9px {
            margin-right: 9px;
            margin-left: 9px
        }

        .mx-15px {
            margin-right: 15px;
            margin-left: 15px
        }

        .p-30px {
            padding: 30px
        }

        .px-30px {
            padding-left: 30px;
            padding-right: 30px
        }

        .btn-linear-primary {
            background: linear-gradient(94.78deg, #8cd25a, #5ea72f)
        }

        .w-180px {
            width: 180px
        }

        .py-10px {
            padding-top: 10px;
            padding-bottom: 10px
        }

        .rounded-18px {
            border-radius: 18px
        }

        .text-size-14px {
            font-size: 14px
        }

        .leading-16px {
            line-height: 16px
        }

        .text-black-gray {
            color: #585858
        }

        .mb-18px {
            margin-bottom: 18px
        }

        .rounded-3px {
            border-radius: 3px
        }

        .mr-6px {
            margin-right: 6px
        }

        .text-gray-info {
            color: #666
        }

        .text-gray-light {
            color: #999
        }

        .mr-10px {
            margin-right: 10px
        }

        .text-size-15px {
            font-size: 15px
        }

        .mt-18px {
            margin-top: 18px
        }

        .px-143px {
            padding-left: 143px;
            padding-right: 143px
        }

        .font-size-22px {
            font-size: 22px
        }

        .mb-20px {
            margin-bottom: 20px
        }

        .mb-14px {
            margin-bottom: 14px
        }

        .border-primary {
            border-color: #6dae43
        }

        .w-150px {
            width: 150px
        }

        .alert-cm-pop-wap.alert-cm-pop {
            width: calc(100% - 32px)
        }

        .alert-cm-pop {
            border-radius: 12px
        }

        .alert-cm-pop .el-message-box__header {
            padding: 12px 30px;
            border-bottom: 1px solid rgba(0, 0, 0, .06)
        }

        .alert-cm-pop .el-message-box__title {
            font-size: 18px;
            font-weight: 700;
            color: #222;
            text-align: center
        }

        .alert-cm-pop .el-message-box__close {
            color: #222
        }

        .alert-cm-pop .el-message-box__content {
            padding: 24px 30px;
            color: #222;
            font-size: 15px;
            text-align: center
        }

        .alert-cm-pop .el-message-box__btns {
            padding: 0 0 20px;
            display: flex;
            justify-content: center
        }

        .alert-cm-pop .el-message-box__btns .el-button {
            width: 150px;
            height: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            color: #6dae43;
            border: 1px solid #6dae43;
            border-radius: 18px;
            background: #fff
        }

        .alert-cm-pop .el-message-box__headerbtn {
            top: 10px;
            right: 10px
        }

        .mb-10px {
            margin-bottom: 10px
        }

        .text-size-22px {
            font-size: 22px
        }

        .text-size-8px {
            font-size: 8px
        }

        .mr-3px {
            margin-right: 3px
        }

        .w-102px {
            width: 102px
        }

        .h-102px {
            height: 102px
        }

        .mr-30px {
            margin-right: 30px
        }

        .mb-22px {
            margin-bottom: 22px
        }

        .rounded-22px {
            border-radius: 22px
        }

        .bg-gray-main {
            background: #f8f8f8
        }

        .text-color-gray {
            color: rgba(78, 76, 76, .3882352941)
        }

        .mb-9px {
            margin-bottom: 9px
        }

        .mb-15px {
            margin-bottom: 15px
        }

        .max-w-80per {
            max-width: 80%
        }

        .text-break-word {
            word-break: break-word
        }

        .font-size-24px {
            font-size: 24px
        }

        .style-button-author {
            color: #6dae43;
            border: 1px solid #6dae43;
            border-radius: 15px
        }

        .style-button-author,
        .style-button-author-hide {
            padding-top: 8px;
            padding-bottom: 8px;
            font-size: 14px;
            line-height: 16px;
            text-align: center;
            white-space: nowrap;
            cursor: pointer
        }

        .style-button-author-hide {
            color: #999;
            border: 1px solid #999;
            border-radius: 15px
        }

        .style-button-author-publish {
            padding-top: 8px;
            padding-bottom: 8px;
            border-radius: 15px;
            background: linear-gradient(96.34deg, #44bbfe, #1e78fe)
        }

        .style-button-add-chapter,
        .style-button-author-publish {
            color: #fff;
            font-size: 14px;
            line-height: 16px;
            text-align: center;
            white-space: nowrap;
            cursor: pointer
        }

        .style-button-add-chapter {
            background: linear-gradient(94.78deg, #8cd25a, #5ea72f);
            border-radius: 20px
        }

        .border-bottom-author {
            border-bottom: 1px solid rgba(0, 0, 0, .06);
            padding-top: 20px;
            margin-bottom: 20px;
            cursor: pointer
        }

        .border-bottom-list {
            border-bottom: 1px solid rgba(0, 0, 0, .06);
            margin-bottom: 15px;
            padding-bottom: 15px
        }

        .style-button-author:hover {
            background: linear-gradient(94.78deg, #8cd25a, #5ea72f);
            color: #fff
        }

        .w-88 {
            width: 350px
        }

        .opacity-015 {
            opacity: .15
        }

        .w-9-375 {
            width: 150px
        }

        .tooltip {
            width: 210px;
            height: 111px;
            background: #000;
            color: #fff;
            text-align: center;
            padding: 10px 20px;
            border-radius: 6px;
            top: calc(100% + 10px);
            transform: translateX(-39%);
            font-weight: 400;
            font-size: 14px;
            line-height: 18px;
            position: absolute;
            z-index: 999
        }

        .tooltip-box {
            position: relative
        }

        .triangle {
            border-width: 0 6px 5px;
            border-color: transparent transparent #000;
            position: absolute;
            top: -5px;
            left: 50%;
            transform: translate(-50%)
        }

        .max-w-6-215,
        .w-6-215 {
            width: 98px
        }

        .h-1-875,
        .max-h-1-875 {
            height: 30px
        }

        .border-3 {
            border-width: 3px
        }

        .h-11-cdv {
            height: 11px
        }

        .bg-save-temporary {
            background: rgba(175, 82, 222, .15)
        }

        .contest-image {
            max-width: 120px;
            height: 175px
        }

        .contest-image,
        .my-contest-image {
            width: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            background: #f1f1f1;
            border-radius: 6px
        }

        .my-contest-image {
            max-width: 80px;
            height: 117px
        }

        .contest-image-top {
            width: 160px;
            height: 234px;
            -o-object-fit: cover;
            object-fit: cover;
            background: #f1f1f1;
            border-radius: 6px
        }

        .mt-15 {
            margin-top: 15px
        }

        .btn-cancel-author {
            width: 90px
        }

        .el-popup-parent--hidden {
            padding-right: 0 !important
        }

        body,
        html {
            color: #222;
            font-family: "Roboto", sans-serif;
            font-size: 16px
        }

        body {
            overflow-x: hidden;
            background-color: #f8f8f8
        }

        ::-webkit-scrollbar-track {
            background-color: transparent;
            border-radius: 25px
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 4px
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 25px;
            background-color: rgba(0, 0, 0, .1)
        }

        .bg-white {
            background-color: #fff
        }

        .text-color-cdv {
            color: #6dae43
        }

        .cdv-g-title-box .cdv-g-title {
            font-weight: 700;
            font-size: 24px;
            line-height: 30px;
            color: #222
        }

        .wrap-page-filter {
            display: flex;
            min-height: 36vh
        }

        .wrap-page-filter .filter-storybooks-wrap {
            flex: 0 0 272px
        }

        .wrap-page-filter .storybooks-content-wrap {
            flex-grow: 1;
            margin-left: 50px
        }

        .list-chapter-pagination {
            margin-top: 30px;
            text-align: right
        }

        .list-chapter-pagination .el-pagination.is-background .btn-next,
        .list-chapter-pagination .el-pagination.is-background .btn-prev,
        .list-chapter-pagination .el-pagination.is-background .number {
            background: #fff
        }

        .list-chapter-pagination .el-pagination.is-background .btn-next,
        .list-chapter-pagination .el-pagination.is-background .btn-prev,
        .list-chapter-pagination .el-pagination.is-background .el-pager li {
            border-radius: 6px
        }

        .list-chapter-pagination .el-pagination.is-background .el-pager li:not(.disabled).active {
            background: linear-gradient(94.78deg, #8cd25a, #5ea72f)
        }

        .list-chapter-pagination .el-pagination.is-background .el-pager li:not(.disabled, .active):hover {
            color: #5ea72f
        }

        .list-chapter-pagination .custom-jumper {
            margin-top: 18px
        }

        .list-chapter-pagination .custom-jumper-count-page,
        .list-chapter-pagination .custom-jumper-gotopage {
            font-size: 14px;
            line-height: 16px;
            text-align: center;
            color: #222
        }

        .list-chapter-pagination .custom-jumper-gotopage {
            margin-right: 12px
        }

        .list-chapter-pagination .custom-jumper-count-page {
            margin-left: 6px
        }

        .list-chapter-pagination .custom-jumper-action {
            margin-left: 30px;
            width: 48px;
            height: 36px;
            background: linear-gradient(94.78deg, #8cd25a, #5ea72f);
            border-radius: 3px;
            font-weight: 400;
            font-size: 14px;
            line-height: 16px;
            text-align: center;
            color: #fff
        }

        .list-chapter-pagination .el-input-number {
            width: unset
        }

        .list-chapter-pagination .el-input-number .el-input__inner {
            background: #f8f8f8;
            border: 1px solid #e8e9e9;
            border-radius: 3px;
            width: 48px;
            height: 36px;
            padding: 0 5px
        }

        .bg-header-mobile {
            background: transparent
        }

        .bg-header-mobile.onScroll {
            background: #fff
        }

        .el-drawer__body {
            background: #fff !important
        }

        .drawer-sort {
            height: auto !important
        }

        .story-item-image {
            max-width: 93px
        }

        .bg-banner-wap {
            background: hsla(0, 0%, 97.3%, .4);
            -webkit-backdrop-filter: blur(40px);
            backdrop-filter: blur(40px);
            filter: blur(40px)
        }

        .bg-banner-image {
            background-position: 50%;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 5px;
            filter: blur(40px)
        }

        .popover-menu-custom {
            padding: 0 !important;
            border: none !important
        }

        .scrollable-tabs-container {
            color: #999;
            font-size: 15px;
            line-height: 30px;
            max-width: 400px;
            font-weight: 500;
            margin: 0 auto;
            position: relative
        }

        .scrollable-tabs-container ul {
            display: flex;
            margin: 0;
            list-style: none;
            overflow-x: scroll;
            -ms-overflow-style: none;
            scrollbar-width: none;
            scroll-behavior: smooth
        }

        .scrollable-tabs-container ul.dragging a {
            pointer-events: none
        }

        .scrollable-tabs-container ul.dragging {
            scroll-behavior: auto
        }

        .scrollable-tabs-container ul::-webkit-scrollbar {
            display: none
        }

        .scrollable-tabs-container a {
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            white-space: nowrap
        }

        .scrollable-tabs-container a.active-tab {
            color: #0bafff;
            font-weight: 700;
            position: relative
        }

        a.active-tab:after {
            content: "";
            position: absolute;
            width: 100%;
            left: 0;
            height: 2px;
            background: #0bafff;
            bottom: 0
        }

        a.active-tab:before {
            content: "";
            position: absolute;
            left: 50%;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-bottom: 7px solid #0bafff;
            bottom: 0;
            transform: translateX(-50%)
        }

        .dialog-appoint-confirm-wap .el-dialog__header {
            display: none !important
        }

        .dialog-appoint-confirm-wap .el-dialog {
            border-radius: 16px !important
        }

        .translateY {
            transform: translateY(-50%)
        }

        .translateX {
            transform: translateX(-50%)
        }

        .translate-center {
            transform: translate(-50%, -50%)
        }

        .content-chapter p {
            margin-top: 16px !important
        }

        .z-max {
            z-index: 9999
        }

        .drawer-chapter-reader {
            top: 50px !important
        }

        .drawer-chapter-reader .el-drawer {
            width: 100vw !important
        }

        .drawer-chapter-reader .el-drawer__header {
            border-bottom: 1px solid #e8e9e9;
            height: 56px !important;
            padding-top: 0 !important;
            font-size: 18px !important;
            line-height: 24px !important;
            color: #222 !important;
            font-weight: 500;
            margin-bottom: 0 !important
        }

        .drawer-chapter-setting .el-drawer {
            height: 311px !important;
            border-radius: 0 0 16px 16px !important
        }

        .backgroud-storybook-custom {
            background: hsla(0, 0%, 97.3%, .6);
            -webkit-backdrop-filter: blur(25px);
            backdrop-filter: blur(25px)
        }

        .bg-cdv-top {
            background: linear-gradient(94.78deg, #8cd25a, #5ea72f)
        }

        input[type=checkbox] {
            width: 20px
        }

        .input-add-comment-wap textarea {
            border: none !important;
            outline: none !important;
            background-color: transparent !important;
            overflow-wrap: break-word;
            overflow-y: auto;
            white-space: pre-wrap;
            word-break: break-word;
            padding-right: 35px;
            text-align: justify;
            padding-left: 0 !important
        }

        .chapter-content span {
            background: inherit !important
        }

        .input-add-comment-wap textarea::-webkit-scrollbar {
            display: none
        }

        .animate-spin-loading {
            animation: spinLoading .8s linear infinite
        }

        @media(max-width:1024px) {
            .el-input__inner {
                border-radius: 16px !important;
                width: 94% !important;
                border-width: 0 !important;
                background: #f5f5f5
            }
        }

        @keyframes spinLoading {
            0% {
                transform: rotate(0deg)
            }

            to {
                transform: rotate(1turn)
            }
        }

        .dialog-hidden-header .el-dialog__header {
            display: none !important;
            padding: 0 !important
        }

        .custom-selector-wap {
            padding: 6px 20px !important
        }

        .box-inset {
            background: linear-gradient(180deg, #000, transparent);
            position: absolute;
            top: 0;
            height: 10vh;
            width: 100%;
            opacity: .3
        }

        .drawer-comment {
            height: auto !important;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px
        }

        .disable-select-text {
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none
        }

        .dialog-report-comment-success {
            border-radius: 16px !important
        }

        .dialog-report-comment-success .el-dialog__header {
            padding: 0 !important;
            display: none !important
        }

        .dialog-report-comment-success .el-dialog__body {
            padding: 16px !important
        }

        .drawer-report-comment .el-drawer__body {
            background: #fff !important
        }

        .drawer-report-comment .cs-checkbox {
            display: block;
            margin: 0 0 10px
        }

        .drawer-report-comment .cs-checkbox .el-checkbox__label {
            color: #222
        }

        .drawer-report-comment .content-other {
            padding: 11px 18px;
            background: #f8f8f8;
            border-radius: 6px;
            border: none;
            outline: none;
            resize: none
        }

        .rotate-cs-180 {
            transform: rotate(180deg)
        }

        .list-button-wap .status-item span {
            width: 100%;
            border-radius: 18px !important
        }

        .story-border {
            border: .33px solid rgba(0, 0, 0, .06)
        }

        .bg-layout-slide {
            background: hsla(0, 0%, 97.3%, .5)
        }

        .filter .el-checkbox__input.is-disabled.is-checked .el-checkbox__inner {
            background-color: #6dae43 !important;
            border-color: #6dae43 !important
        }

        .filter .el-checkbox__input.is-disabled.is-checked .el-checkbox__inner:after {
            border-color: #fff !important
        }

        input[type=checkbox] {
            border-radius: 3px;
            width: 22px;
            height: 20px
        }

        input[type=checkbox]:checked {
            display: flex;
            justify-content: center;
            align-items: center;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: #6dae43
        }





        .swiper-slide-zoomed {
            cursor: move
        }

        .swiper-lazy-preloader {
            width: 42px;
            height: 42px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -21px;
            margin-top: -21px;
            z-index: 10;
            transform-origin: 50%;
            animation: swiper-preloader-spin 1s linear infinite;
            box-sizing: border-box;
            border-radius: 50%;
            border: 4px solid var(--swiper-theme-color);
            border: 4px solid var(--swiper-preloader-color, var(--swiper-theme-color));
            border-top: 4px solid transparent
        }

        .swiper-lazy-preloader-white {
            --swiper-preloader-color: #fff
        }

        .swiper-lazy-preloader-black {
            --swiper-preloader-color: #000
        }

        @keyframes swiper-preloader-spin {
            to {
                transform: rotate(1turn)
            }
        }

        .swiper-container .swiper-notification {
            position: absolute;
            left: 0;
            top: 0;
            pointer-events: none;
            opacity: 0;
            z-index: -1000
        }

        .swiper-container-fade.swiper-container-free-mode .swiper-slide {
            transition-timing-function: ease-out
        }

        .swiper-container-fade .swiper-slide {
            pointer-events: none;
            transition-property: opacity
        }

        .swiper-container-fade .swiper-slide .swiper-slide {
            pointer-events: none
        }

        .swiper-container-fade .swiper-slide-active,
        .swiper-container-fade .swiper-slide-active .swiper-slide-active {
            pointer-events: auto
        }

        .swiper-container-cube {
            overflow: visible
        }

        .swiper-container-cube .swiper-slide {
            pointer-events: none;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            z-index: 1;
            visibility: hidden;
            transform-origin: 0 0;
            width: 100%;
            height: 100%
        }

        .swiper-container-cube .swiper-slide .swiper-slide {
            pointer-events: none
        }

        .swiper-container-cube.swiper-container-rtl .swiper-slide {
            transform-origin: 100% 0
        }

        .swiper-container-cube .swiper-slide-active,
        .swiper-container-cube .swiper-slide-active .swiper-slide-active {
            pointer-events: auto
        }

        .swiper-container-cube .swiper-slide-active,
        .swiper-container-cube .swiper-slide-next,
        .swiper-container-cube .swiper-slide-next+.swiper-slide,
        .swiper-container-cube .swiper-slide-prev {
            pointer-events: auto;
            visibility: visible
        }

        .swiper-container-cube .swiper-slide-shadow-bottom,
        .swiper-container-cube .swiper-slide-shadow-left,
        .swiper-container-cube .swiper-slide-shadow-right,
        .swiper-container-cube .swiper-slide-shadow-top {
            z-index: 0;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden
        }

        .swiper-container-cube .swiper-cube-shadow {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            opacity: .6;
            z-index: 0
        }

        .swiper-container-cube .swiper-cube-shadow:before {
            content: "";
            background: #000;
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            filter: blur(50px)
        }

        .swiper-container-flip {
            overflow: visible
        }

        .swiper-container-flip .swiper-slide {
            pointer-events: none;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            z-index: 1
        }

        .swiper-container-flip .swiper-slide .swiper-slide {
            pointer-events: none
        }

        .swiper-container-flip .swiper-slide-active,
        .swiper-container-flip .swiper-slide-active .swiper-slide-active {
            pointer-events: auto
        }

        .swiper-container-flip .swiper-slide-shadow-bottom,
        .swiper-container-flip .swiper-slide-shadow-left,
        .swiper-container-flip .swiper-slide-shadow-right,
        .swiper-container-flip .swiper-slide-shadow-top {
            z-index: 0;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden
        }

        /*purgecss end ignore*/
        /*purgecss start ignore*/
        .nuxt-progress {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            width: 0;
            opacity: 1;
            transition: width .1s, opacity .4s;
            background-color: #000;
            z-index: 999999
        }

        .nuxt-progress.nuxt-progress-notransition {
            transition: none
        }

        .nuxt-progress-failed {
            background-color: red
        }

        /*purgecss end ignore*/
        /*purgecss start ignore*/
        .header-top .header-top__content {
            display: flex;
            align-items: center;
            padding-top: 18px;
            justify-content: space-between
        }

        .header-top .header-top__content .header-top__logo {
            margin-right: 70px
        }

        .header-top .header-top__content .header-top__search-box {
            flex-grow: 1
        }

        .header-top .header-top__content .uni-search {
            display: block
        }

        .header-top .header-top__content .uni-search .el-input__inner {
            border: 1px solid #e8e9e9;
            border-radius: 3px;
            padding-right: 15px
        }

        .header-top .header-top__content .uni-search .el-input-group__append .el-button {
            background: #6dae43;
            color: #fff;
            padding: 0;
            width: 48px;
            height: 40px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .header-top .header-top__content .uni-search .el-input-group__append .el-button>i {
            font-size: 18px;
            font-weight: 700
        }

        .header-top .header-top__content .btn-upgrade-author,
        .header-top .header-top__content .el-dropdown-link,
        .header-top .header-top__content .header-top__right-action,
        .header-top .header-top__content .user-not-login {
            display: flex;
            align-items: center
        }

        .header-top .header-top__content .header-top__right-action {
            margin-left: 60px
        }

        .header-top .header-top__content .btn-upgrade-author,
        .header-top .header-top__content .header-notification-wrap {
            margin-right: 30px
        }

        .header-top .header-top__content .btn-upgrade-author>img,
        .header-top .header-top__content .el-dropdown-link>img,
        .header-top .header-top__content .user-not-login>img {
            margin-right: 6px
        }

        .header-top .header-top__content .btn-login {
            cursor: pointer
        }

        .header-top .header-top__content .header-notification-wrap {
            position: relative
        }

        .header-top .header-top__content .header-notification-wrap .icon-notification,
        .header-top .header-top__content .header-notification-wrap .noti-badge-number {
            cursor: pointer
        }

        .header-top .header-top__content .header-notification-wrap .noti-badge-number {
            position: absolute;
            top: -10px;
            right: -10px;
            padding: 0 5px;
            min-width: 25px;
            height: 18px;
            text-align: center;
            border-radius: 9px;
            background: #ff3b30;
            color: #fff;
            line-height: 18px;
            font-size: 12px
        }

        .header-menu {
            position: relative;
            border-top: 1px solid #e8e9e9;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, .06);
            margin-top: 20px
        }

        .header-menu .header-menu__content .el-menu--horizontal>.el-menu-item,
        .header-menu .header-menu__content .el-menu--horizontal>.el-submenu .el-submenu__title {
            height: 42px;
            line-height: 42px;
            padding: 0;
            color: #222
        }

        .header-menu .header-menu__content .el-menu--horizontal>.el-menu-item>a,
        .header-menu .header-menu__content .el-menu--horizontal>.el-submenu .el-submenu__title>a {
            display: inline-block;
            padding: 0 20px
        }

        .header-menu .header-menu__content .el-menu--horizontal>.el-menu-item.menu-item-all-novel,
        .header-menu .header-menu__content .el-menu--horizontal>.el-submenu .el-submenu__title.menu-item-all-novel {
            margin-left: 20px
        }

        .header-menu .header-menu__content .el-menu--horizontal>.el-menu-item.menu-category-vertical,
        .header-menu .header-menu__content .el-menu--horizontal>.el-submenu .el-submenu__title.menu-category-vertical {
            padding-left: 0
        }

        .header-menu .header-menu__content .el-menu--horizontal>.el-menu-item.is-active,
        .header-menu .header-menu__content .el-menu--horizontal>.el-submenu .el-submenu__title.is-active {
            border-bottom: none;
            color: #222
        }

        .header-menu .header-menu__content .el-menu--horizontal>.el-menu-item.is-choose,
        .header-menu .header-menu__content .el-menu--horizontal>.el-submenu .el-submenu__title.is-choose {
            border-bottom: 2px solid #6dae43 !important;
            color: #6dae43
        }

        .header-menu .header-menu__content .el-menu--horizontal>.el-menu-item:hover {
            color: #6dae43
        }

        .header-menu .header-menu__content .el-menu.el-menu--horizontal {
            border: none
        }

        .header-menu .header-menu__content .menu-item-category {
            min-width: 145px
        }

        .header-menu .header-menu__content .menu-item-category .el-submenu__title {
            display: flex;
            align-items: center;
            font-weight: 700;
            position: relative;
            padding-right: 20px !important
        }

        .header-menu .header-menu__content .menu-item-category .el-submenu__title:before {
            content: "";
            background-color: #e8e9e9;
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            width: 1px;
            height: 24px
        }

        .header-menu .header-menu__content .menu-item-category .el-submenu__title .menu-cate-box.is-choose {
            color: #6dae43
        }

        .header-menu .header-menu__content .menu-item-category .el-submenu__title .menu-cate-box.is-choose .svg-wrap>svg>path {
            stroke: #6dae43
        }

        .header-menu .header-menu__content .menu-item-category .el-submenu__title .menu-cate-box+.el-submenu__icon-arrow {
            color: #6dae43
        }

        .header-menu .header-menu__content .menu-item-category .el-submenu__title .svg-wrap {
            display: inline-block;
            margin-right: 10px
        }

        .header-menu .header-menu__content .menu-item-category .el-submenu__title .menu-item-category-title {
            flex: 1 0 75px
        }

        .el-icon-caret-bottom-cdv-color {
            color: #6dae43
        }

        .menu-header-top .el-menu-item-group__title {
            font-size: 14px;
            line-height: 16px;
            color: #222;
            font-weight: 700;
            text-transform: uppercase;
            padding: 18px 18px 9px !important
        }

        .menu-header-top .el-menu-item {
            padding: 0 !important;
            height: auto !important
        }

        .menu-header-top .el-menu-item a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            font-weight: 400;
            font-size: 14px;
            line-height: 16px;
            color: #222;
            height: 34px;
            padding: 0 18px
        }

        .menu-header-top .el-menu-item a span.count-novel {
            color: #999
        }

        .menu-header-top .el-menu-item a:hover {
            color: #6dae43 !important;
            background: #f2f8ee
        }

        .menu-header-top .el-menu-item a:hover span.count-novel {
            color: #6dae43 !important
        }

        .menu-header-top .el-menu-item.is-choose>a {
            color: #6dae43 !important;
            background: #f2f8ee
        }

        .menu-header-top .el-menu-item.is-choose>a span.count-novel {
            color: #6dae43 !important
        }

        .user-dropdown-list .el-dropdown-menu__item.user-dropdown-item:focus,
        .user-dropdown-list .el-dropdown-menu__item.user-dropdown-item:not(.is-disabled):hover {
            background-color: rgba(109, 174, 67, .06);
            color: #6dae43
        }

        .user-dropdown-list .popper__arrow {
            display: none
        }

        .header-top__logo {
            display: flex;
            align-items: flex-end
        }

        /*purgecss end ignore*/
        /*purgecss start ignore*/
        .box-timer[data-v-deff1eea] {
            top: 54%
        }

        .bg-contest[data-v-deff1eea] {
            background: #e7f4df;
            -webkit-backdrop-filter: blur(15px);
            backdrop-filter: blur(15px);
            border-radius: 12px;
            border: 1px solid rgba(109, 174, 67, .2)
        }

        h1[data-v-deff1eea] {
            font-weight: 400;
            font-size: 64px;
            line-height: 75px;
            border-bottom: 1px solid rgba(109, 174, 67, .2);
            padding-bottom: 26px
        }

        .box-info[data-v-deff1eea] {
            height: 100%;
            max-height: 886px;
            overflow: auto;
            line-height: 28px
        }

        .size-top-1[data-v-deff1eea] {
            height: 100%;
            width: 100%;
            max-width: 260px;
            max-height: 376px
        }

        .size-top-2[data-v-deff1eea] {
            height: 100%;
            width: 100%;
            max-width: 220px;
            max-height: 322px
        }

        /*purgecss end ignore*/

    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LW3KP03R30"></script>
    <script>
        function gtag() {
            dataLayer.push(arguments)
        }
        window.dataLayer = window.dataLayer || [], gtag("js", new Date), gtag("config", "G-LW3KP03R30")
    </script>
</head>

<body>
    <div data-server-rendered="true" id="__nuxt"><!---->
        <div id="__layout">
            <div element-loading-text="Loading..." element-loading-spinner="el-icon-loading"
                element-loading-background="rgba(0, 0, 0, 0.8)">
                <div class="layout-desktop w-full min-h-screen"><!----> <!---->

                    <div class="w-full bg-cdv-8 bg-no-repeat min-h-screen pb-28" data-v-deff1eea data-v-48e2e5ce>
                        <div class="banner-landing relative mb-15" data-v-deff1eea><img
                                src="{{asset('assets/client/img/dkctv.png')}}" alt="banner-landing" class="w-full h-full"
                                data-v-deff1eea>

                        </div>
                        <div class="w-full container mx-auto" data-v-deff1eea>
                            <div class="w-full" data-v-deff1eea>
                                <div id="rule" class="bg-contest py-6" data-v-deff1eea>
                                    <h1 class="text-cdv text-center" data-v-deff1eea>Điều kiện trở thành cộng tác viên</h1>
                                    <div class="box-info px-15 py-6 text-black-222 text-lg-18-21" data-v-deff1eea>
                                        <p>1. Độ tuổi tối thiểu</p>
                                        <p>- Điều kiện: Ứng viên phải từ đủ 18 tuổi trở lên để đủ điều kiện tham gia chương trình cộng tác viên.</p>
                                        <p>- Giải thích: Quy định này nhằm đảm bảo rằng các ứng viên có khả năng chịu trách nhiệm về hành vi và cam kết của mình.
                                            Những người ở độ tuổi trưởng thành thường có kỹ năng tư duy phản biện tốt hơn,
                                            có thể đưa ra quyết định hợp lý và có trách nhiệm hơn trong các cam kết liên quan đến công việc.
                                            Điều này cũng giúp bảo vệ lợi ích của cả ứng viên và tổ chức trong các giao dịch hợp tác.</p>
                                        <p>&nbsp;</p>
                                        <p>2. Cam kết và trách nhiệm</p>
                                        <p>- Điều kiện: Ứng viên phải cam kết thực hiện các nhiệm vụ và trách nhiệm của mình một cách nghiêm túc.</p>
                                        <p>- Giải thích: Sự cam kết và trách nhiệm đối với công việc là rất quan trọng trong việc xây dựng một môi trường làm việc hiệu quả.
                                            Cộng tác viên cần phải đảm bảo rằng họ hoàn thành các nhiệm vụ đúng hạn, tuân thủ các quy trình và tiêu chuẩn chất lượng,
                                            cũng như duy trì một thái độ chuyên nghiệp trong tất cả các tình huống.
                                            Sự trách nhiệm này không chỉ ảnh hưởng đến hiệu suất làm việc cá nhân mà còn có tác động đến toàn bộ nhóm và tổ chức.</p>
                                        <p>&nbsp;</p>
                                        <p>3. Độ d&agrave;i t&aacute;c phẩm: 60.000 từ đến 120.000 từ</p>
                                        <p>- Độ dài tác phẩm là một yếu tố quan trọng quyết định nội dung và cấu trúc của một tác phẩm văn học.
                                            Với độ dài từ 60.000 từ đến 120.000 từ, tác phẩm có thể được phát triển một cách sâu sắc và phong phú,
                                            cho phép tác giả khai thác những chủ đề phức tạp và xây dựng các nhân vật đa chiều. Độ dài này thường phù hợp với các thể loại như tiểu thuyết,
                                            cho phép người viết không chỉ dàn trải cốt truyện mà còn phát triển tâm lý nhân vật, tạo nên những mối liên hệ giữa các tình huống
                                            và khai thác các khía cạnh văn hóa xã hội.
                                            Điều này giúp độc giả có được một trải nghiệm đọc sâu sắc và đáng nhớ.</p>
                                        <p>&nbsp;</p>
                                        <p>4. Kiến thức về sản phẩm</p>
                                        <p>- Điều kiện: Ứng viên phải có kiến thức đầy đủ về sản phẩm hoặc dịch vụ mà họ sẽ đại diện.</p>
                                        <p>- Giải thích: Kiến thức về sản phẩm là rất quan trọng để cộng tác viên có thể cung cấp thông tin chính xác và đáng tin cậy cho khách hàng.
                                            Họ cần hiểu rõ tính năng, lợi ích, và cách sử dụng sản phẩm để có thể trả lời các câu hỏi và giải quyết thắc mắc một cách hiệu quả.
                                            Điều này không chỉ giúp tạo lòng tin từ khách hàng mà còn làm tăng khả năng bán hàng và nâng cao trải nghiệm của khách hàng.</p>
                                        <p>&nbsp;</p>
                                        <p>5. Đạo đức nghề nghiệp</p>
                                        <p>- Điều kiện: Ứng viên phải tuân thủ các quy định và nguyên tắc đạo đức trong công việc.</p>
                                        <p>- Giải thích: Đạo đức nghề nghiệp đóng vai trò quan trọng trong việc xây dựng lòng tin giữa cộng tác viên và khách hàng.
                                            Các ứng viên cần phải trung thực trong việc quảng bá sản phẩm, không lừa dối khách hàng và luôn bảo vệ thông tin cá nhân của khách hàng.
                                            Điều này không chỉ đảm bảo rằng cộng tác viên hoạt động một cách có trách nhiệm mà còn góp phần nâng cao uy
                                            tín của tổ chức và thương hiệu trong mắt khách hàng.</p>
                                        <p>&nbsp;</p>
                                        <p>6. Các nội dung nghiêm cấm</p>
                                        <p>- Tuyên truyền chống Nhà nước Cộng hòa xã hội chủ nghĩa Việt Nam; phá hoại khối đại đoàn kết toàn dân tộc;
                                        </p>
                                        <p>- Tuyên truyền kích động chiến tranh xâm lược, gây hận thù giữa các dân tộc và nhân dân các nước; kích động bạo lực; truyền bá tư tưởng phản động, lối sống dâm ô, đồi trụy, hành vi tội ác, tệ nạn xã hội, mê tín dị đoan, phá hoại thuần phong mỹ tục;
                                        </p>
                                        <p>- Tiết lộ bí mật nhà nước, bí mật đời tư của cá nhân và bí mật khác do pháp luật quy định;
                                        </p>
                                        <p>- Xuyên tạc sự thật lịch sử, phủ nhận thành tựu cách mạng; xúc phạm dân tộc, danh nhân, anh hùng dân tộc; không thể hiện hoặc thể hiện không đúng chủ quyền quốc gia; vu khống, xúc phạm uy tín của cơ quan, tổ chức và danh dự, nhân phẩm của cá nhân.
                                        </p>
                                        <strong><a style="color: #339966;"
                                                            href="https://drive.google.com/drive/u/2/folders/1w1aBCZh_55qR-vT5JBBRKVPykJgZAA49">Xem
                                                            tại đ&acirc;y</a></strong>
                                        <p>&nbsp;</p>
                                    </div>
                                </div>

                                <div class="" data-v-deff1eea>

                                    <div class="text-center " data-v-deff1eea>
                                         <button  href="{{ route('dang-ky-cong-tac-vien') }}"
                                            class="bg-gradient-cdv rounded-3xl text-white-default py-1-5 px-10-5 text-2xl-24-28 mt-4-5 mb-7-5"
                                            data-v-deff1eea>

                                            <a href="{{ route('dang-ky-cong-tac-vien') }}">Đăng ký</a>
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="el-dialog__wrapper" style="display:none;">
                        <div role="dialog" aria-modal="true" aria-label="dialog"
                            class="el-dialog dialog-common max-w-86 relative" style="margin-top:15vh;">
                            <div class="el-dialog__header"><span class="el-dialog__title"></span><!----></div>
                            <!----><!---->
                        </div>
                    </div> <!---->

                </div>
            </div>
        </div>
    </div>

@endsection
