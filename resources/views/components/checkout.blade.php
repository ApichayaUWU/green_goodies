
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
    fill: #FFFFFF; 
}

</style>
<button type="submit" class="custom-button ml-96 pl-32">
<a href="{{ route('products.index') }}">

<svg width="260" height="60" viewBox="0 0 260 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect class="button-background" width="186" height="60" rx="30" fill="#ACE094"/>
                                    <path d="M154 46L169 31L154 16" stroke="#4C4343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M35.1748 32.8369C35.4189 32.8369 35.6484 32.9443 35.8633 33.1592C36.0879 33.374 36.2002 33.5986 36.2002 33.833C36.2002 34.0771 36.166 34.2676 36.0977 34.4043C35.6289 35.459 34.96 36.4355 34.0908 37.334C33.2314 38.2324 32.2061 38.9551 31.0146 39.502C29.8232 40.0488 28.4902 40.3223 27.0156 40.3223C25.5605 40.3223 24.2422 40.0537 23.0605 39.5166C21.8887 38.9795 20.8828 38.2373 20.043 37.29C19.2129 36.333 18.5732 35.2295 18.124 33.9795C17.6846 32.7197 17.4648 31.3672 17.4648 29.9219C17.4648 28.4961 17.6895 27.168 18.1387 25.9375C18.5879 24.6973 19.2324 23.6133 20.0723 22.6855C20.9121 21.748 21.9131 21.0156 23.0752 20.4883C24.2471 19.9609 25.5459 19.6973 26.9717 19.6973C28.417 19.6973 29.7305 19.9512 30.9121 20.459C32.1035 20.9668 33.1338 21.6455 34.0029 22.4951C34.8818 23.3447 35.5654 24.2871 36.0537 25.3223C36.1318 25.4785 36.1709 25.6445 36.1709 25.8203C36.1709 26.1035 36.0684 26.3574 35.8633 26.582C35.668 26.7969 35.4629 26.9043 35.248 26.9043C34.6621 26.9043 34.2715 26.6895 34.0762 26.2598C33.5 25.0391 32.5967 24.0088 31.3662 23.1689C30.1357 22.3193 28.6709 21.8945 26.9717 21.8945C25.4678 21.8945 24.1689 22.2559 23.0752 22.9785C21.9814 23.7012 21.1367 24.6729 20.541 25.8936C19.9551 27.1045 19.6621 28.4619 19.6621 29.9658C19.6621 31.4697 19.9551 32.8418 20.541 34.082C21.127 35.3125 21.9668 36.2939 23.0605 37.0264C24.1641 37.749 25.4727 38.1104 26.9863 38.1104C28.1191 38.1104 29.1494 37.9004 30.0771 37.4805C31.0146 37.0508 31.8252 36.4844 32.5088 35.7812C33.2021 35.0781 33.7295 34.3213 34.0908 33.5107C34.2861 33.0615 34.6475 32.8369 35.1748 32.8369ZM39.4375 20.8398C39.4375 20.5371 39.5449 20.2783 39.7598 20.0635C39.9746 19.8486 40.2334 19.7412 40.5361 19.7412C40.8389 19.7412 41.0977 19.8486 41.3125 20.0635C41.5273 20.2783 41.6348 20.5371 41.6348 20.8398V27.5781C42.123 26.7676 42.7627 26.1328 43.5537 25.6738C44.3447 25.2051 45.1309 24.9707 45.9121 24.9707C48.0898 24.9707 49.6328 25.625 50.541 26.9336C51.459 28.2324 51.918 29.9805 51.918 32.1777V32.3096L51.9033 39.2236V39.2383C51.9033 39.541 51.7959 39.7998 51.5811 40.0146C51.3662 40.2295 51.1074 40.3369 50.8047 40.3369C50.502 40.3369 50.2432 40.2295 50.0283 40.0146C49.8135 39.7998 49.7061 39.541 49.7061 39.2383V39.2236L49.7207 32.2803C49.7207 30.6787 49.4717 29.4238 48.9736 28.5156C48.4854 27.6074 47.5234 27.1533 46.0879 27.1533C45.1797 27.1533 44.3936 27.3438 43.7295 27.7246C43.0654 28.1055 42.5527 28.5889 42.1914 29.1748C41.8398 29.7607 41.6641 30.3564 41.6641 30.9619V39.2529C41.6641 39.5557 41.5566 39.8145 41.3418 40.0293C41.127 40.2441 40.8682 40.3516 40.5654 40.3516C40.2432 40.3516 39.9746 40.2393 39.7598 40.0146C39.5449 39.79 39.4375 39.5361 39.4375 39.2529V20.8398ZM62.7285 40.293C61.3125 40.293 60.0283 39.9414 58.876 39.2383C57.7334 38.5352 56.8252 37.5977 56.1514 36.4258C55.4775 35.2441 55.1406 33.9502 55.1406 32.5439C55.1406 31.2061 55.458 29.9707 56.0928 28.8379C56.7373 27.6953 57.6064 26.7773 58.7002 26.084C59.7939 25.3906 61.0146 25.0439 62.3623 25.0439C63.6025 25.0439 64.7402 25.3516 65.7754 25.9668C66.8203 26.582 67.6553 27.4121 68.2803 28.457C68.915 29.4922 69.2324 30.6445 69.2324 31.9141C69.2324 32.3633 69.1494 32.749 68.9834 33.0713C68.8271 33.3936 68.5342 33.5547 68.1045 33.5547H57.4404C57.5967 34.3652 57.9141 35.1172 58.3926 35.8105C58.8809 36.4941 59.4912 37.0459 60.2236 37.4658C60.9658 37.8857 61.791 38.0957 62.6992 38.0957C63.4707 38.0957 64.2275 37.9248 64.9697 37.583C65.7119 37.2412 66.3223 36.7725 66.8008 36.1768C67.0156 35.8936 67.3037 35.752 67.665 35.752C67.9678 35.752 68.2266 35.8594 68.4414 36.0742C68.6562 36.2891 68.7637 36.5479 68.7637 36.8506C68.7637 37.1143 68.6758 37.3535 68.5 37.5684C67.7969 38.4277 66.9326 39.0967 65.9072 39.5752C64.8916 40.0537 63.832 40.293 62.7285 40.293ZM66.9912 31.3867C66.9033 30.625 66.6445 29.9316 66.2148 29.3066C65.7852 28.6719 65.2383 28.1689 64.5742 27.7979C63.9102 27.4268 63.1777 27.2412 62.377 27.2412C61.5469 27.2412 60.79 27.4316 60.1064 27.8125C59.4229 28.1934 58.8516 28.6963 58.3926 29.3213C57.9434 29.9463 57.6357 30.6348 57.4697 31.3867H66.9912ZM72.1621 32.6318C72.1621 31.2744 72.4844 30.0244 73.1289 28.8818C73.7734 27.7295 74.6426 26.8018 75.7363 26.0986C76.8301 25.3955 78.0508 25.0439 79.3984 25.0439C80.3945 25.0439 81.3027 25.2295 82.123 25.6006C82.9434 25.9717 83.6514 26.46 84.2471 27.0654C84.8428 27.6709 85.3018 28.335 85.624 29.0576C85.7021 29.2139 85.7412 29.3701 85.7412 29.5264C85.7412 29.8291 85.6338 30.0879 85.4189 30.3027C85.2041 30.5078 84.9453 30.6104 84.6426 30.6104C84.4473 30.6104 84.252 30.5518 84.0566 30.4346C83.8613 30.3076 83.7246 30.1514 83.6465 29.9658C83.3145 29.2334 82.7773 28.5938 82.0352 28.0469C81.293 27.5 80.4141 27.2266 79.3984 27.2266C78.4512 27.2266 77.5967 27.4805 76.835 27.9883C76.0732 28.4863 75.4678 29.1504 75.0186 29.9805C74.5693 30.8008 74.3447 31.6895 74.3447 32.6465C74.3447 33.6035 74.5645 34.4971 75.0039 35.3271C75.4531 36.1475 76.0586 36.8115 76.8203 37.3193C77.5918 37.8174 78.4512 38.0664 79.3984 38.0664C80.4141 38.0664 81.293 37.7979 82.0352 37.2607C82.7871 36.7139 83.3291 36.0742 83.6611 35.3418C83.7393 35.1562 83.876 35 84.0713 34.873C84.2666 34.7461 84.4619 34.6826 84.6572 34.6826C84.96 34.6826 85.2188 34.79 85.4336 35.0049C85.6484 35.2197 85.7559 35.4785 85.7559 35.7812C85.7559 35.9473 85.7217 36.0986 85.6533 36.2354C85.3311 36.9482 84.8672 37.6123 84.2617 38.2275C83.666 38.833 82.9531 39.3213 82.123 39.6924C81.3027 40.0635 80.3945 40.249 79.3984 40.249C78.041 40.249 76.8154 39.8975 75.7217 39.1943C74.6279 38.4912 73.7588 37.5635 73.1143 36.4111C72.4795 35.249 72.1621 33.9893 72.1621 32.6318ZM88.9785 20.7812C88.9785 20.498 89.0762 20.2588 89.2715 20.0635C89.4766 19.8584 89.7207 19.7559 90.0039 19.7559C90.2871 19.7559 90.5312 19.8584 90.7363 20.0635C90.9414 20.2588 91.0391 20.5029 91.0293 20.7959V32.2217C92.0938 30.9912 93.1973 29.7998 94.3398 28.6475C95.4824 27.4854 96.6104 26.3135 97.7236 25.1318C97.9189 24.917 98.168 24.8096 98.4707 24.8096C98.7539 24.8096 98.9932 24.9121 99.1885 25.1172C99.3936 25.3125 99.4961 25.5518 99.4961 25.835C99.4961 26.1182 99.3984 26.3574 99.2031 26.5527L94.1787 31.7676L99.4082 38.6377C99.5547 38.8232 99.6279 39.0332 99.6279 39.2676C99.6279 39.5508 99.5254 39.7949 99.3203 40C99.125 40.1953 98.8857 40.293 98.6025 40.293C98.2607 40.293 97.9873 40.1562 97.7822 39.8828L92.7432 33.0713L91.0293 34.7412V39.2236C91.0293 39.5068 90.9268 39.751 90.7217 39.9561C90.5264 40.1514 90.2871 40.249 90.0039 40.249C89.7207 40.249 89.4766 40.1465 89.2715 39.9414C89.0664 39.7363 88.9688 39.4922 88.9785 39.209V20.7812ZM109.149 24.9707C110.175 24.9707 111.132 25.1758 112.021 25.5859C112.909 25.9961 113.686 26.5625 114.35 27.2852C115.023 27.998 115.546 28.8135 115.917 29.7314C116.298 30.6494 116.488 31.6211 116.488 32.6465C116.488 34.0039 116.166 35.2637 115.521 36.4258C114.877 37.5879 114.003 38.5303 112.899 39.2529C111.806 39.9658 110.575 40.3271 109.208 40.3369C107.821 40.3369 106.571 39.9805 105.458 39.2676C104.345 38.5547 103.461 37.6172 102.807 36.4551C102.162 35.2832 101.84 34.0137 101.84 32.6465C101.84 31.6309 102.025 30.6641 102.396 29.7461C102.777 28.8184 103.3 27.998 103.964 27.2852C104.628 26.5625 105.399 25.9961 106.278 25.5859C107.167 25.1758 108.124 24.9707 109.149 24.9707ZM109.149 27.168C108.192 27.168 107.328 27.4219 106.557 27.9297C105.785 28.4375 105.17 29.1064 104.711 29.9365C104.262 30.7568 104.037 31.6504 104.037 32.6172C104.037 33.5938 104.262 34.502 104.711 35.3418C105.16 36.1816 105.775 36.8604 106.557 37.3779C107.338 37.8857 108.217 38.1396 109.193 38.1396C110.16 38.1299 111.024 37.8711 111.786 37.3633C112.558 36.8457 113.168 36.1719 113.617 35.3418C114.066 34.5117 114.291 33.6133 114.291 32.6465C114.291 31.6797 114.062 30.7812 113.603 29.9512C113.153 29.1113 112.538 28.4375 111.757 27.9297C110.985 27.4219 110.116 27.168 109.149 27.168ZM131.02 40.3809C130.717 40.3809 130.468 40.2734 130.272 40.0586C130.087 39.8438 129.994 39.585 129.994 39.2822L129.921 37.5391C129.579 37.959 129.174 38.3887 128.705 38.8281C128.236 39.2578 127.704 39.6191 127.108 39.9121C126.513 40.1953 125.839 40.3369 125.087 40.3369C123.798 40.3369 122.758 40.0049 121.967 39.3408C121.176 38.6768 120.6 37.8027 120.238 36.7188C119.887 35.6348 119.711 34.4727 119.711 33.2324L119.726 26.1279C119.726 25.8252 119.833 25.5664 120.048 25.3516C120.263 25.1367 120.521 25.0293 120.824 25.0293C121.137 25.0293 121.396 25.1367 121.601 25.3516C121.815 25.5664 121.923 25.8301 121.923 26.1426L121.908 33.2324C121.908 34.0918 121.996 34.8975 122.172 35.6494C122.348 36.3916 122.665 36.9922 123.124 37.4512C123.593 37.9102 124.247 38.1396 125.087 38.1396C126.679 38.1396 127.88 37.7148 128.69 36.8652C129.501 36.0156 129.906 34.8193 129.906 33.2764V26.0986C129.906 25.7959 130.014 25.5371 130.229 25.3223C130.443 25.1074 130.702 25 131.005 25C131.317 25 131.576 25.1074 131.781 25.3223C131.996 25.5371 132.104 25.8008 132.104 26.1133L132.118 39.2676C132.118 39.5703 132.011 39.8291 131.796 40.0439C131.591 40.2686 131.332 40.3809 131.02 40.3809ZM137.919 21.9238C137.919 21.6211 138.026 21.3623 138.241 21.1475C138.456 20.9326 138.715 20.8252 139.018 20.8252C139.32 20.8252 139.579 20.9326 139.794 21.1475C140.009 21.3623 140.116 21.6211 140.116 21.9238L140.102 25.2051L142.958 25.2197C143.241 25.2197 143.48 25.3223 143.676 25.5273C143.881 25.7227 143.983 25.9619 143.983 26.2451C143.983 26.5283 143.881 26.7725 143.676 26.9775C143.48 27.1729 143.241 27.2705 142.958 27.2705L140.102 27.2559L140.087 36.3965C140.087 36.9141 140.165 37.334 140.321 37.6562C140.478 37.9688 140.795 38.125 141.273 38.125C141.703 38.125 142.055 38.0469 142.328 37.8906C142.611 37.7246 142.934 37.6416 143.295 37.6416C143.598 37.6416 143.856 37.749 144.071 37.9639C144.286 38.1787 144.394 38.4375 144.394 38.7402C144.394 39.1504 144.218 39.4727 143.866 39.707C143.515 39.9414 143.1 40.1025 142.621 40.1904C142.152 40.2881 141.732 40.3369 141.361 40.3369C140.209 40.3369 139.34 39.9707 138.754 39.2383C138.178 38.4961 137.89 37.5391 137.89 36.3672L137.904 27.2705H135.648C135.365 27.2705 135.121 27.1729 134.916 26.9775C134.721 26.7725 134.623 26.5283 134.623 26.2451C134.623 25.9619 134.721 25.7227 134.916 25.5273C135.121 25.3223 135.365 25.2197 135.648 25.2197H137.904L137.919 21.9238Z" fill="#4C4343"/>
</svg></a></botton>