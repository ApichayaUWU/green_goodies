<style>
.custom-button {
    border: none;
    /* Remove default button border */
    background: transparent;
    /* Make button background transparent */
    cursor: pointer;
    /* Change cursor on hover */
}

.button-background {
    transition: fill 0.5s ease;
}

.custom-button:hover .button-background {
    fill: #EEEEEE; 
}
</style>
<div class="custom-button">
    <button type="submit" id="update-all-btn" class="custom-button">
        <svg width="292" height="60" viewBox="0 0 210 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect  class="button-background" width="190" height="60" rx="30" fill="#ACE094" />
            <path d="M154 46L169 31L154 16" stroke="#4C4343" stroke-width="0.8" stroke-linecap="round"
                stroke-linejoin="round" />
            <path
                d="M27.8857 40.2197C27.583 40.2197 27.3242 40.1123 27.1094 39.8975C26.8945 39.6826 26.7871 39.4238 26.7871 39.1211V39.1064L26.7578 20.8398C26.7578 20.6445 26.8555 20.415 27.0508 20.1514C27.2461 19.8877 27.5098 19.751 27.8418 19.7412L32.4561 19.7119C33.8525 19.7119 35.1025 19.9365 36.2061 20.3857C37.3096 20.835 38.1836 21.5186 38.8281 22.4365C39.4727 23.3447 39.7949 24.4971 39.7949 25.8936C39.7949 27.5049 39.458 28.8037 38.7842 29.79C38.1104 30.7666 37.1729 31.4844 35.9717 31.9434C34.7803 32.3926 33.3984 32.6416 31.8262 32.6904L28.9697 32.749L28.9844 39.1064V39.1211C28.9844 39.4238 28.877 39.6826 28.6621 39.8975C28.4473 40.1123 28.1885 40.2197 27.8857 40.2197ZM37.5977 25.9082C37.5977 24.4727 37.1143 23.4521 36.1475 22.8467C35.1807 22.2314 33.916 21.9238 32.3535 21.9238H28.9551L28.9697 30.5518L31.7822 30.4932C32.9541 30.4639 33.9746 30.3125 34.8438 30.0391C35.7129 29.7656 36.3867 29.3018 36.8652 28.6475C37.3535 27.9834 37.5977 27.0703 37.5977 25.9082ZM49.8877 24.9854C50.9326 24.9854 51.8701 25.2881 52.7002 25.8936C53.54 26.499 54.2725 27.1387 54.8975 27.8125L55.0293 25.9668C55.0293 25.6836 55.1074 25.4443 55.2637 25.249C55.4199 25.0439 55.6396 24.9414 55.9229 24.9414C56.2061 24.9414 56.4453 25.0439 56.6406 25.249C56.8457 25.4443 56.9482 25.6836 56.9482 25.9668V39.209C56.9482 39.4922 56.8457 39.7363 56.6406 39.9414C56.4453 40.1367 56.2061 40.2344 55.9229 40.2344C55.6396 40.2344 55.3955 40.1367 55.1904 39.9414C54.9951 39.7363 54.8975 39.4922 54.8975 39.209V37.5391C54.2529 38.2422 53.4863 38.877 52.5977 39.4434C51.7188 40.0098 50.791 40.293 49.8145 40.293C48.8086 40.293 47.876 40.0879 47.0166 39.6777C46.1572 39.2578 45.4053 38.6914 44.7607 37.9785C44.1162 37.2656 43.6133 36.4551 43.252 35.5469C42.9004 34.6289 42.7246 33.667 42.7246 32.6611C42.7246 31.665 42.9004 30.708 43.252 29.79C43.6133 28.8623 44.1162 28.042 44.7607 27.3291C45.415 26.6064 46.1768 26.0352 47.0459 25.6152C47.915 25.1953 48.8623 24.9854 49.8877 24.9854ZM54.9707 32.5732C54.9707 31.626 54.7412 30.7471 54.2822 29.9365C53.833 29.1162 53.2227 28.4521 52.4512 27.9443C51.6895 27.4365 50.8398 27.1826 49.9023 27.1826C48.9551 27.1826 48.1055 27.4414 47.3535 27.959C46.6016 28.4766 46.0059 29.1553 45.5664 29.9951C45.1367 30.8252 44.9219 31.7139 44.9219 32.6611C44.9219 33.5986 45.1367 34.4824 45.5664 35.3125C45.9961 36.1426 46.5771 36.8164 47.3096 37.334C48.0518 37.8418 48.8867 38.0957 49.8145 38.0957C50.752 38.0957 51.6113 37.8369 52.3926 37.3193C53.1738 36.792 53.7988 36.1084 54.2676 35.2686C54.7363 34.4189 54.9707 33.5205 54.9707 32.5732ZM60.5518 24.9707C60.7568 24.9707 60.9521 25.0342 61.1377 25.1611C61.333 25.2881 61.4697 25.4395 61.5479 25.6152L66.8945 37.1729L71.4648 25.6885C71.543 25.4932 71.6797 25.3271 71.875 25.1904C72.0703 25.0537 72.2754 24.9854 72.4902 24.9854C72.8711 24.9854 73.1689 25.1465 73.3838 25.4688C73.6084 25.7812 73.6475 26.1279 73.501 26.5088L67.041 42.71C66.7578 43.4131 66.377 44.1309 65.8984 44.8633C65.4199 45.5957 64.8242 46.2109 64.1113 46.709C63.3984 47.2168 62.5488 47.4707 61.5625 47.4707C61.2598 47.4707 61.001 47.3633 60.7861 47.1484C60.5713 46.9336 60.4639 46.6748 60.4639 46.3721C60.4639 46.0889 60.5664 45.835 60.7715 45.6104C60.9766 45.3955 61.2207 45.2832 61.5039 45.2734C62.1777 45.2246 62.7393 45.0244 63.1885 44.6729C63.6377 44.3311 64.0137 43.8916 64.3164 43.3545C64.6289 42.8271 64.8926 42.2607 65.1074 41.6553C65.332 41.0596 65.5518 40.4932 65.7666 39.9561L59.5557 26.5527C59.4873 26.3965 59.4531 26.2354 59.4531 26.0693C59.4531 25.7666 59.5605 25.5078 59.7754 25.293C59.9902 25.0781 60.249 24.9707 60.5518 24.9707ZM83.418 20.7959C83.418 20.4834 83.5254 20.2246 83.7402 20.0195C83.9648 19.8047 84.2383 19.6973 84.5605 19.6973C84.9023 19.6973 85.1807 19.8438 85.3955 20.1367L97.1143 35.8984V20.8398C97.1143 20.5371 97.2217 20.2783 97.4365 20.0635C97.6514 19.8486 97.9102 19.7412 98.2129 19.7412C98.5156 19.7412 98.7744 19.8486 98.9893 20.0635C99.2041 20.2783 99.3115 20.5371 99.3115 20.8398V20.8545L99.2969 39.1943C99.2969 39.5068 99.1846 39.7705 98.96 39.9854C98.7451 40.1904 98.4766 40.293 98.1543 40.293C97.8223 40.293 97.5439 40.1465 97.3193 39.8535L85.6152 24.1064V39.1797C85.6152 39.4824 85.5078 39.7412 85.293 39.9561C85.0781 40.1709 84.8193 40.2783 84.5166 40.2783C84.2139 40.2783 83.9551 40.1709 83.7402 39.9561C83.5254 39.7412 83.418 39.4824 83.418 39.1797V20.7959ZM109.858 24.9707C110.884 24.9707 111.841 25.1758 112.729 25.5859C113.618 25.9961 114.395 26.5625 115.059 27.2852C115.732 27.998 116.255 28.8135 116.626 29.7314C117.007 30.6494 117.197 31.6211 117.197 32.6465C117.197 34.0039 116.875 35.2637 116.23 36.4258C115.586 37.5879 114.712 38.5303 113.608 39.2529C112.515 39.9658 111.284 40.3271 109.917 40.3369C108.53 40.3369 107.28 39.9805 106.167 39.2676C105.054 38.5547 104.17 37.6172 103.516 36.4551C102.871 35.2832 102.549 34.0137 102.549 32.6465C102.549 31.6309 102.734 30.6641 103.105 29.7461C103.486 28.8184 104.009 27.998 104.673 27.2852C105.337 26.5625 106.108 25.9961 106.987 25.5859C107.876 25.1758 108.833 24.9707 109.858 24.9707ZM109.858 27.168C108.901 27.168 108.037 27.4219 107.266 27.9297C106.494 28.4375 105.879 29.1064 105.42 29.9365C104.971 30.7568 104.746 31.6504 104.746 32.6172C104.746 33.5938 104.971 34.502 105.42 35.3418C105.869 36.1816 106.484 36.8604 107.266 37.3779C108.047 37.8857 108.926 38.1396 109.902 38.1396C110.869 38.1299 111.733 37.8711 112.495 37.3633C113.267 36.8457 113.877 36.1719 114.326 35.3418C114.775 34.5117 115 33.6133 115 32.6465C115 31.6797 114.771 30.7812 114.312 29.9512C113.862 29.1113 113.247 28.4375 112.466 27.9297C111.694 27.4219 110.825 27.168 109.858 27.168ZM139.624 26.0547C139.624 26.1914 139.6 26.3184 139.551 26.4355L134.863 39.5752C134.795 39.7705 134.658 39.9414 134.453 40.0879C134.248 40.2344 134.038 40.3076 133.823 40.3076C133.608 40.3076 133.403 40.2344 133.208 40.0879C133.013 39.9414 132.876 39.7705 132.798 39.5752L129.15 29.3506L125.488 39.6777C125.42 39.8828 125.283 40.0537 125.078 40.1904C124.873 40.3369 124.663 40.4102 124.448 40.4102C124.233 40.4102 124.028 40.3369 123.833 40.1904C123.638 40.0439 123.501 39.873 123.423 39.6777L118.735 26.5381C118.687 26.4209 118.662 26.2939 118.662 26.1572C118.662 25.8545 118.77 25.5957 118.984 25.3809C119.199 25.166 119.458 25.0586 119.761 25.0586C119.985 25.0586 120.195 25.1318 120.391 25.2783C120.596 25.415 120.732 25.5859 120.801 25.791L124.448 36.0303L128.11 25.7031C128.188 25.498 128.325 25.3271 128.521 25.1904C128.716 25.0537 128.921 24.9854 129.136 24.9854C129.351 24.9854 129.561 25.0586 129.766 25.2051C129.971 25.3418 130.107 25.5078 130.176 25.7031L133.823 35.9424L137.485 25.7031C137.563 25.498 137.7 25.3223 137.896 25.1758C138.101 25.0293 138.311 24.9561 138.525 24.9561C138.828 24.9561 139.087 25.0684 139.302 25.293C139.517 25.5078 139.624 25.7617 139.624 26.0547Z"
                fill="#4C4343" />
        </svg>
    </button>
</div>