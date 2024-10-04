<x-app-layout>

    <head>
        <style>
        h2 {
            text-align: center;
            color: #4C4343;
        }

        .brownBg {
            background-color: #F4EDDC;
        }

        h1 {
            margin-left: 25px;
            color: #4C4343;
            margin-top: 10px;
        }

        .box {
            border-radius: 30px;
            background: #F4EDDC;
            padding: 10px;
            width: auto;
            height: auto;
        }
        </style>
    </head>
    <div class="brownBg pt-6 pb-3 flex flex-row flex-wrap justify-center">
        <h2 class="font-semibold text-4xl text-#4C4343-800 leading-tight">
            {{ __('My Infomation') }}
        </h2>
    </div>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="box">
                <div class="">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="box">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="box">
                <div class="flex flex-row justify-between ">
                    <div>
                        <h1 class="text-lg ml-9"> Address</h1>
                    </div>


                    <div class="mr-5">
                        <a href="{{ route('address.form') }}">
                            <svg width="150" height="40" viewBox="0 0 210 45" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="210" height="45" rx="22.5" fill="#ACE094" />
                                <path
                                    d="M49.4648 14.9966C49.4648 14.7362 49.5544 14.5205 49.7334 14.3496C49.9206 14.1706 50.1484 14.0811 50.417 14.0811C50.7018 14.0811 50.9338 14.2031 51.1128 14.4473L60.8784 27.582V15.0332C60.8784 14.7809 60.9679 14.5653 61.147 14.3862C61.326 14.2072 61.5417 14.1177 61.7939 14.1177C62.0462 14.1177 62.2619 14.2072 62.4409 14.3862C62.62 14.5653 62.7095 14.7809 62.7095 15.0332V15.0454L62.6973 30.3286C62.6973 30.589 62.6037 30.8088 62.4165 30.9878C62.2375 31.1587 62.0137 31.2441 61.7451 31.2441C61.4684 31.2441 61.2365 31.1221 61.0493 30.8779L51.2959 17.7554V30.3164C51.2959 30.5687 51.2064 30.7843 51.0273 30.9634C50.8483 31.1424 50.6326 31.2319 50.3804 31.2319C50.1281 31.2319 49.9124 31.1424 49.7334 30.9634C49.5544 30.7843 49.4648 30.5687 49.4648 30.3164V14.9966ZM71.7305 31.2441C70.5505 31.2441 69.4803 30.9512 68.52 30.3652C67.5679 29.7793 66.811 28.998 66.2495 28.0215C65.688 27.0368 65.4072 25.9585 65.4072 24.7866C65.4072 23.6717 65.6717 22.6423 66.2007 21.6982C66.7378 20.7461 67.4621 19.9811 68.3735 19.4033C69.285 18.8255 70.3022 18.5366 71.4253 18.5366C72.4588 18.5366 73.4069 18.793 74.2695 19.3057C75.1403 19.8184 75.8361 20.5101 76.3569 21.3809C76.8859 22.2435 77.1504 23.2038 77.1504 24.2617C77.1504 24.6361 77.0812 24.9575 76.9429 25.2261C76.8127 25.4946 76.5685 25.6289 76.2104 25.6289H67.3237C67.4539 26.3044 67.7184 26.931 68.1172 27.5088C68.5241 28.0785 69.0327 28.5382 69.6431 28.8882C70.2616 29.2381 70.9492 29.4131 71.7061 29.4131C72.349 29.4131 72.9797 29.2707 73.5981 28.9858C74.2166 28.701 74.7253 28.3104 75.124 27.814C75.3031 27.578 75.5431 27.46 75.8442 27.46C76.0965 27.46 76.3122 27.5495 76.4912 27.7285C76.6702 27.9076 76.7598 28.1232 76.7598 28.3755C76.7598 28.5952 76.6865 28.7946 76.54 28.9736C75.9541 29.6898 75.2339 30.2472 74.3794 30.646C73.533 31.0448 72.6501 31.2441 71.7305 31.2441ZM75.2827 23.8223C75.2095 23.1875 74.9938 22.6097 74.6357 22.0889C74.2777 21.5599 73.8219 21.1408 73.2686 20.8315C72.7152 20.5223 72.1048 20.3677 71.4375 20.3677C70.7458 20.3677 70.1151 20.5264 69.5454 20.8438C68.9757 21.1611 68.4997 21.5802 68.1172 22.1011C67.7428 22.6219 67.4865 23.1956 67.3481 23.8223H75.2827ZM95.8394 19.3789C95.8394 19.4928 95.819 19.5986 95.7783 19.6963L91.8721 30.646C91.8151 30.8088 91.7012 30.9512 91.5303 31.0732C91.3594 31.1953 91.1844 31.2563 91.0054 31.2563C90.8263 31.2563 90.6554 31.1953 90.4927 31.0732C90.3299 30.9512 90.216 30.8088 90.1509 30.646L87.1113 22.1255L84.0596 30.7314C84.0026 30.9023 83.8887 31.0448 83.7178 31.1587C83.5469 31.2808 83.3719 31.3418 83.1929 31.3418C83.0138 31.3418 82.8429 31.2808 82.6802 31.1587C82.5174 31.0366 82.4035 30.8942 82.3384 30.7314L78.4321 19.7817C78.3914 19.6841 78.3711 19.5783 78.3711 19.4644C78.3711 19.2121 78.4606 18.9964 78.6396 18.8174C78.8187 18.6383 79.0343 18.5488 79.2866 18.5488C79.4738 18.5488 79.6488 18.6099 79.8115 18.7319C79.9824 18.8459 80.0964 18.9883 80.1533 19.1592L83.1929 27.6919L86.2446 19.0859C86.3097 18.915 86.4237 18.7726 86.5864 18.6587C86.7492 18.5448 86.9201 18.4878 87.0991 18.4878C87.2782 18.4878 87.4531 18.5488 87.624 18.6709C87.7949 18.7848 87.9089 18.9232 87.9658 19.0859L91.0054 27.6187L94.0571 19.0859C94.1222 18.915 94.2362 18.7686 94.3989 18.6465C94.5698 18.5244 94.7448 18.4634 94.9238 18.4634C95.1761 18.4634 95.3918 18.557 95.5708 18.7441C95.7498 18.9232 95.8394 19.1348 95.8394 19.3789ZM104.006 31.2808C103.802 31.2808 103.607 31.1912 103.42 31.0122C103.241 30.8332 103.151 30.646 103.151 30.4507C103.151 30.2554 103.18 30.1007 103.237 29.9868L109.938 14.667C109.995 14.5449 110.101 14.4229 110.256 14.3008C110.419 14.1787 110.577 14.1177 110.732 14.1177C111.171 14.1177 111.468 14.3008 111.623 14.667L118.337 29.9624C118.386 30.0682 118.41 30.1862 118.41 30.3164C118.41 30.5443 118.333 30.7599 118.178 30.9634C118.032 31.1587 117.84 31.2563 117.604 31.2563C117.124 31.2563 116.807 31.0692 116.652 30.6948L114.199 25.0918H107.412L104.909 30.7192C104.755 31.0936 104.453 31.2808 104.006 31.2808ZM110.781 17.3281L108.205 23.2607H113.393L110.781 17.3281ZM125.319 31.2563C124.213 31.2563 123.232 30.9634 122.377 30.3774C121.523 29.7915 120.852 29.0225 120.363 28.0703C119.875 27.11 119.631 26.0806 119.631 24.9819C119.631 24.1519 119.773 23.3503 120.058 22.5771C120.343 21.804 120.746 21.1164 121.267 20.5142C121.787 19.9038 122.402 19.4196 123.11 19.0615C123.818 18.7035 124.591 18.5244 125.429 18.5244C126.227 18.5244 126.955 18.7238 127.614 19.1226C128.273 19.5213 128.851 19.9811 129.348 20.502V14.9844C129.348 14.7321 129.437 14.5164 129.616 14.3374C129.795 14.1584 130.011 14.0688 130.263 14.0688C130.524 14.0688 130.739 14.1584 130.91 14.3374C131.089 14.5164 131.179 14.7321 131.179 14.9844V30.353C131.179 30.6053 131.089 30.821 130.91 31C130.731 31.179 130.515 31.2686 130.263 31.2686C130.011 31.2686 129.803 31.179 129.641 31C129.486 30.821 129.409 30.6053 129.409 30.353L129.348 29.1812C128.884 29.6532 128.31 30.117 127.626 30.5728C126.943 31.0285 126.174 31.2563 125.319 31.2563ZM125.356 29.4253C126.186 29.4253 126.898 29.2015 127.492 28.7539C128.086 28.3063 128.542 27.7285 128.859 27.0205C129.177 26.3125 129.335 25.576 129.335 24.811C129.335 24.0461 129.177 23.3258 128.859 22.6504C128.55 21.9749 128.103 21.4256 127.517 21.0024C126.931 20.5711 126.227 20.3555 125.405 20.3555C124.615 20.3555 123.928 20.5833 123.342 21.0391C122.756 21.4867 122.3 22.0685 121.975 22.7847C121.649 23.4927 121.486 24.2373 121.486 25.0186C121.486 25.7917 121.645 26.516 121.962 27.1914C122.288 27.8587 122.74 28.3999 123.317 28.8149C123.903 29.2218 124.583 29.4253 125.356 29.4253ZM139.553 31.2563C138.446 31.2563 137.465 30.9634 136.611 30.3774C135.756 29.7915 135.085 29.0225 134.597 28.0703C134.108 27.11 133.864 26.0806 133.864 24.9819C133.864 24.1519 134.007 23.3503 134.292 22.5771C134.576 21.804 134.979 21.1164 135.5 20.5142C136.021 19.9038 136.635 19.4196 137.343 19.0615C138.051 18.7035 138.824 18.5244 139.663 18.5244C140.46 18.5244 141.188 18.7238 141.848 19.1226C142.507 19.5213 143.085 19.9811 143.581 20.502V14.9844C143.581 14.7321 143.671 14.5164 143.85 14.3374C144.029 14.1584 144.244 14.0688 144.497 14.0688C144.757 14.0688 144.973 14.1584 145.144 14.3374C145.323 14.5164 145.412 14.7321 145.412 14.9844V30.353C145.412 30.6053 145.323 30.821 145.144 31C144.965 31.179 144.749 31.2686 144.497 31.2686C144.244 31.2686 144.037 31.179 143.874 31C143.719 30.821 143.642 30.6053 143.642 30.353L143.581 29.1812C143.117 29.6532 142.543 30.117 141.86 30.5728C141.176 31.0285 140.407 31.2563 139.553 31.2563ZM139.589 29.4253C140.419 29.4253 141.132 29.2015 141.726 28.7539C142.32 28.3063 142.775 27.7285 143.093 27.0205C143.41 26.3125 143.569 25.576 143.569 24.811C143.569 24.0461 143.41 23.3258 143.093 22.6504C142.784 21.9749 142.336 21.4256 141.75 21.0024C141.164 20.5711 140.46 20.3555 139.638 20.3555C138.849 20.3555 138.161 20.5833 137.575 21.0391C136.989 21.4867 136.534 22.0685 136.208 22.7847C135.882 23.4927 135.72 24.2373 135.72 25.0186C135.72 25.7917 135.878 26.516 136.196 27.1914C136.521 27.8587 136.973 28.3999 137.551 28.8149C138.137 29.2218 138.816 29.4253 139.589 29.4253ZM155.532 19.6597C155.532 19.8794 155.458 20.0828 155.312 20.27C155.166 20.4572 155.007 20.5508 154.836 20.5508C154.584 20.5508 154.344 20.4938 154.116 20.3799C153.896 20.2578 153.627 20.1968 153.31 20.1968C152.513 20.1968 151.886 20.3677 151.43 20.7095C150.974 21.0513 150.649 21.4907 150.454 22.0278C150.266 22.5568 150.173 23.1183 150.173 23.7124V30.3652C150.173 30.6175 150.096 30.8332 149.941 31.0122C149.794 31.1994 149.567 31.293 149.257 31.293C148.956 31.293 148.728 31.1994 148.574 31.0122C148.419 30.8332 148.342 30.6175 148.342 30.3652V19.5376C148.342 19.2365 148.439 18.9924 148.635 18.8052C148.838 18.618 149.054 18.5244 149.282 18.5244C149.518 18.5244 149.709 18.618 149.855 18.8052C150.01 18.9842 150.087 19.2284 150.087 19.5376L150.197 20.8804C150.311 20.506 150.523 20.1357 150.832 19.7695C151.149 19.4033 151.52 19.0981 151.943 18.854C152.374 18.6017 152.81 18.4756 153.249 18.4756C153.876 18.4756 154.413 18.561 154.86 18.7319C155.308 18.8947 155.532 19.2039 155.532 19.6597ZM162.6 31.2441C161.42 31.2441 160.349 30.9512 159.389 30.3652C158.437 29.7793 157.68 28.998 157.119 28.0215C156.557 27.0368 156.276 25.9585 156.276 24.7866C156.276 23.6717 156.541 22.6423 157.07 21.6982C157.607 20.7461 158.331 19.9811 159.243 19.4033C160.154 18.8255 161.171 18.5366 162.294 18.5366C163.328 18.5366 164.276 18.793 165.139 19.3057C166.009 19.8184 166.705 20.5101 167.226 21.3809C167.755 22.2435 168.02 23.2038 168.02 24.2617C168.02 24.6361 167.95 24.9575 167.812 25.2261C167.682 25.4946 167.438 25.6289 167.08 25.6289H158.193C158.323 26.3044 158.588 26.931 158.986 27.5088C159.393 28.0785 159.902 28.5382 160.512 28.8882C161.131 29.2381 161.818 29.4131 162.575 29.4131C163.218 29.4131 163.849 29.2707 164.467 28.9858C165.086 28.701 165.594 28.3104 165.993 27.814C166.172 27.578 166.412 27.46 166.713 27.46C166.966 27.46 167.181 27.5495 167.36 27.7285C167.539 27.9076 167.629 28.1232 167.629 28.3755C167.629 28.5952 167.556 28.7946 167.409 28.9736C166.823 29.6898 166.103 30.2472 165.249 30.646C164.402 31.0448 163.519 31.2441 162.6 31.2441ZM166.152 23.8223C166.079 23.1875 165.863 22.6097 165.505 22.0889C165.147 21.5599 164.691 21.1408 164.138 20.8315C163.584 20.5223 162.974 20.3677 162.307 20.3677C161.615 20.3677 160.984 20.5264 160.415 20.8438C159.845 21.1611 159.369 21.5802 158.986 22.1011C158.612 22.6219 158.356 23.1956 158.217 23.8223H166.152ZM176.491 18.4268C177.582 18.4268 178.575 18.6628 179.47 19.1348C180.373 19.6068 181.04 20.2497 181.472 21.0635C181.545 21.1937 181.582 21.3361 181.582 21.4907C181.582 21.7349 181.492 21.9424 181.313 22.1133C181.142 22.2842 180.935 22.3696 180.69 22.3696C180.544 22.3696 180.393 22.3249 180.239 22.2354C180.084 22.1377 179.974 22.0238 179.909 21.8936C179.616 21.3402 179.169 20.9211 178.566 20.6362C177.972 20.3433 177.277 20.1968 176.479 20.1968C175.974 20.1968 175.425 20.266 174.831 20.4043C174.237 20.5345 173.724 20.7542 173.293 21.0635C172.87 21.3646 172.658 21.7715 172.658 22.2842C172.658 22.6829 172.829 22.9922 173.171 23.2119C173.513 23.4316 173.936 23.5944 174.44 23.7002C174.953 23.7979 175.47 23.867 175.991 23.9077C176.52 23.9484 176.971 23.9891 177.346 24.0298C178.086 24.103 178.815 24.2373 179.531 24.4326C180.247 24.6279 180.841 24.9494 181.313 25.397C181.785 25.8446 182.021 26.4915 182.021 27.3379C182.021 28.2493 181.752 28.998 181.215 29.584C180.678 30.1618 179.991 30.589 179.152 30.8657C178.314 31.1343 177.443 31.2686 176.54 31.2686C175.271 31.2686 174.119 31.0244 173.085 30.5361C172.052 30.0397 171.291 29.3154 170.803 28.3633C170.738 28.2493 170.705 28.111 170.705 27.9482C170.705 27.7041 170.791 27.4966 170.961 27.3257C171.132 27.1548 171.34 27.0693 171.584 27.0693C171.739 27.0693 171.893 27.1182 172.048 27.2158C172.202 27.3053 172.312 27.4193 172.377 27.5576C172.727 28.2249 173.264 28.7173 173.989 29.0347C174.713 29.3439 175.563 29.4985 176.54 29.4985C177.102 29.4985 177.667 29.4334 178.237 29.3032C178.815 29.1649 179.295 28.937 179.677 28.6196C180.068 28.3022 180.263 27.875 180.263 27.3379C180.263 26.9147 180.088 26.5933 179.738 26.3735C179.388 26.1457 178.949 25.9829 178.42 25.8853C177.891 25.7876 177.354 25.7225 176.809 25.6899C176.271 25.6574 175.808 25.6167 175.417 25.5679C174.725 25.4865 174.029 25.3481 173.33 25.1528C172.638 24.9494 172.06 24.6239 171.596 24.1763C171.132 23.7287 170.9 23.098 170.9 22.2842C170.9 21.6006 171.067 21.0187 171.401 20.5386C171.743 20.0503 172.186 19.6515 172.731 19.3423C173.285 19.0249 173.891 18.793 174.55 18.6465C175.209 18.5 175.856 18.4268 176.491 18.4268ZM190.749 18.4268C191.84 18.4268 192.832 18.6628 193.728 19.1348C194.631 19.6068 195.298 20.2497 195.729 21.0635C195.803 21.1937 195.839 21.3361 195.839 21.4907C195.839 21.7349 195.75 21.9424 195.571 22.1133C195.4 22.2842 195.192 22.3696 194.948 22.3696C194.802 22.3696 194.651 22.3249 194.497 22.2354C194.342 22.1377 194.232 22.0238 194.167 21.8936C193.874 21.3402 193.426 20.9211 192.824 20.6362C192.23 20.3433 191.534 20.1968 190.737 20.1968C190.232 20.1968 189.683 20.266 189.089 20.4043C188.495 20.5345 187.982 20.7542 187.551 21.0635C187.128 21.3646 186.916 21.7715 186.916 22.2842C186.916 22.6829 187.087 22.9922 187.429 23.2119C187.771 23.4316 188.194 23.5944 188.698 23.7002C189.211 23.7979 189.728 23.867 190.249 23.9077C190.778 23.9484 191.229 23.9891 191.604 24.0298C192.344 24.103 193.072 24.2373 193.789 24.4326C194.505 24.6279 195.099 24.9494 195.571 25.397C196.043 25.8446 196.279 26.4915 196.279 27.3379C196.279 28.2493 196.01 28.998 195.473 29.584C194.936 30.1618 194.248 30.589 193.41 30.8657C192.572 31.1343 191.701 31.2686 190.798 31.2686C189.528 31.2686 188.377 31.0244 187.343 30.5361C186.31 30.0397 185.549 29.3154 185.061 28.3633C184.995 28.2493 184.963 28.111 184.963 27.9482C184.963 27.7041 185.048 27.4966 185.219 27.3257C185.39 27.1548 185.598 27.0693 185.842 27.0693C185.996 27.0693 186.151 27.1182 186.306 27.2158C186.46 27.3053 186.57 27.4193 186.635 27.5576C186.985 28.2249 187.522 28.7173 188.247 29.0347C188.971 29.3439 189.821 29.4985 190.798 29.4985C191.359 29.4985 191.925 29.4334 192.495 29.3032C193.072 29.1649 193.553 28.937 193.935 28.6196C194.326 28.3022 194.521 27.875 194.521 27.3379C194.521 26.9147 194.346 26.5933 193.996 26.3735C193.646 26.1457 193.207 25.9829 192.678 25.8853C192.149 25.7876 191.612 25.7225 191.066 25.6899C190.529 25.6574 190.065 25.6167 189.675 25.5679C188.983 25.4865 188.287 25.3481 187.587 25.1528C186.896 24.9494 186.318 24.6239 185.854 24.1763C185.39 23.7287 185.158 23.098 185.158 22.2842C185.158 21.6006 185.325 21.0187 185.659 20.5386C186 20.0503 186.444 19.6515 186.989 19.3423C187.543 19.0249 188.149 18.793 188.808 18.6465C189.467 18.5 190.114 18.4268 190.749 18.4268Z"
                                    fill="#4C4343" />
                                <path
                                    d="M36.7188 23C36.7188 23.373 36.5706 23.7306 36.3069 23.9944C36.0431 24.2581 35.6855 24.4062 35.3125 24.4062H26.4062V33.3125C26.4062 33.6855 26.2581 34.0431 25.9944 34.3069C25.7306 34.5706 25.373 34.7188 25 34.7188C24.627 34.7188 24.2694 34.5706 24.0056 34.3069C23.7419 34.0431 23.5938 33.6855 23.5938 33.3125V24.4062H14.6875C14.3145 24.4062 13.9569 24.2581 13.6931 23.9944C13.4294 23.7306 13.2812 23.373 13.2812 23C13.2812 22.627 13.4294 22.2694 13.6931 22.0056C13.9569 21.7419 14.3145 21.5938 14.6875 21.5938H23.5938V12.6875C23.5938 12.3145 23.7419 11.9569 24.0056 11.6931C24.2694 11.4294 24.627 11.2812 25 11.2812C25.373 11.2812 25.7306 11.4294 25.9944 11.6931C26.2581 11.9569 26.4062 12.3145 26.4062 12.6875V21.5938H35.3125C35.6855 21.5938 36.0431 21.7419 36.3069 22.0056C36.5706 22.2694 36.7188 22.627 36.7188 23Z"
                                    fill="#4C4343" />
                            </svg>

                        </a>
                    </div>

                </div>
                <div class="">
                    @include('profile.partials.user-address-index', ['addresses' => $addresses])
                </div>

            </div>

            <div class="box">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>


        </div>
    </div>
</x-app-layout>