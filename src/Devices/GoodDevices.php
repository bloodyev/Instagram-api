<?php

namespace InstagramAPI\Devices;

/**
 * Internal list of verified Android devices.
 *
 * @author SteveJobzniak (https://github.com/SteveJobzniak)
 *
 * This is a list of popular, modern Android phones, all VERIFIED to support
 * receiving the max-resolution videos from Instagram's API replies. This list
 * has to be hand-crafted, because bad devices only receive low-resolution
 * videos! Instagram's API looks at device MODEL when deciding to deliver HD.
 *
 * The goal with this list is to have a list of ~10 modern phones which we only
 * have to refresh every few years, as they slip away into obscurity.
 *
 * Here are the rules for building the list:
 *
 * - Find a top-list of the best Android phones for [current year].
 * - Only select devices with super high resolution screens (at least 1080p+).
 * - Find the model at https://www.handsetdetection.com/properties/devices.
 * - Some phones have tons of sub-models. Find the phone on Amazon and look at
 *   the details to find sub-model identifier for the most popular US variant!
 * - Research the model's popularity. For example, NEVER include a Samsung phone
 *   with an "X" suffix (such as SM-G935X). Those are STORE DEMO units.
 * - Check if they've recorded any Instagram user agent. If there are multiple
 *   agents for Instagram, compare them all carefully and pick the latest.
 * - Look closely to make sure the string wasn't truncated or modified on their
 *   site. I've seen phones lacking the locale and final parenthesis, for
 *   example. Or strings that are all-lowercase. DO NOT USE THOSE!
 * - Verify the device details by doing a Google search for the model identifier
 *   you found in the user-agent, to verify all specs match the real device.
 * - Enter good models below in the same format as the other devices. Triple and
 *   quadruple check that it is 100% CORRECT for that device.
 * - Always enter the EXACT Android version that the user agent was seen with on
 *   the website above, which is usually the OS version the phone released with.
 * - The Android version is the first part of the agent, such as "23/6.0.1".
 *
 * Here's an example string:
 * "Instagram 10.9.0 Android (23/6.0.1; 480dpi; 1080x1776; LENOVO/Lenovo; Lenovo P2a42; P2a42; qcom; fr_FR)".
 *
 * The format is made via the android.os.Build library:
 * "Instagram %s Android (%s/%s; %s; %s; %s/%s; %s; %s; %s)
 * 1. Instagram VERSION.
 * 2. Android API VERSION (Build$VERSION.SDK_INT)
 * 3. Android VERSION (Build$VERSION.RELEASE)
 * 4. DPI.
 * 5. Display Resolution.
 * 6. MANUFACTURER.
 * 7 (optional). BRAND (this "/"-portion with a brand doesn't always exist).
 * 8. MODEL.
 * 9. DEVICE.
 * 10. CPU (Build.HARDWARE)
 * 11. Language (Build.LOCALE).
 *
 * We only want the part within parenthesis, and we ignore the locale.
 *
 * That gives us the following string:
 * "23/6.0.1; 480dpi; 1080x1776; LENOVO/Lenovo; Lenovo P2a42; P2a42; qcom".
 *
 * However, note that the device above isn't at least 1920x1080. Don't use it.
 *
 *
 * When you have a "possibly good" agent, you must finally TEST IT: Use the
 * "devtools/checkDevices.php" developer script to check your agent and verify
 * that Instagram detects it as a high-resolution device and gives it HD videos!
 *
 *
 * LASTLY, YOU MUST UNDERSTAND THE FOLLOWING: THE DEVICE LIST BELOW IS MEANT TO
 * BE A "SNAPSHOT" OF DEVICES AND THEIR ANDROID VERSIONS AT THAT MOMENT IN TIME.
 * WE ARE *ONLY* SUPPOSED TO *ADD* NEW DEVICES TO IT OR COMPLETELY *DELETE* OLD
 * DEVICES. DO *NOT* "EDIT" THE LIST TO TRY TO "IMPROVE" OR "UPDATE" ANDROID
 * VERSIONS OR *ANYTHING* ELSE ABOUT AN EXISTING DEVICE. EDITING EVEN A *SINGLE*
 * BYTE WILL CAUSE *ALL* USERS OF THAT DEVICE TO BE LOGGED OUT AND *RE-ASSIGNED*
 * TO A BRAND NEW PHONE HARDWARE FINGERPRINT AND A DIFFERENT RANDOM DEVICE. THAT
 * BEHAVIOR IS INTENTIONAL AND *BY DESIGN*. IT ALLOWS US TO SAFELY BLACKLIST BAD
 * DEVICES AND IT DISCOURAGES DUMB, FRIVOLOUS "UPGRADES", THUS ENSURING THAT WE
 * *ONLY* IDENTIFY OUR DEVICES WITH THE ACTUAL *ANDROID* VERSION THEY *SHIPPED*
 * WITH, WHICH IS THE SAFEST WAY TO IDENTIFY OUR VIRTUAL DEVICES. MOST REAL
 * USERS DON'T UPGRADE ANDROID OS BEYOND WHAT THE PHONE ORIGINALLY SHIPPED WITH.
 *
 *
 * THIS DEVICE LIST IS CRITICAL TO THE OPERATION OF THE API. DO NOT CONTRIBUTE
 * TO THIS LIST IF YOU DON'T UNDERSTAND *ALL* INSTRUCTIONS ABOVE. PERFECTLY. ALL
 * CONTRIBUTIONS MUST INCLUDE THE RELEASE DATE, HANDSETDETECTION AND A LINK TO A
 * PAGE (SUCH AS AMAZON) FOR THAT EXACT MODEL SPECIFIER, AS SEEN BELOW, SO THAT
 * WE CAN VALIDATE ALL AGENTS TO SEE THAT YOU AREN'T ADDING AN INCORRECTLY
 * WRITTEN OR UNPOPULAR DEVICE AGENT WHICH WILL GET US BANNED BY INSTAGRAM!
 */
class GoodDevices
{
    /**
     * List of supported binary architectures for the device CPUs.
     *
     * NOTE TO COLLABORATORS: Currently all devices use the same 64-bit ARM list,
     * but if future added devices have different CPU capabilities, this will need
     * a rewrite to be able to specify different CPU_ABI values per-device. It's
     * very unlikely to happen, though, since we only add 64-bit CPU devices to the
     * list. And there's no real value to increasing ARM chip sizes beyond 64-bit
     * since the physical address lines take up more space, and there are no real
     * numerical benefits beyond 64-bit numbers. So we most likely won't need
     * any per-device values here.
     *
     * Also note that the list below is actually the two 32-bit ARM identifiers.
     * That's because Instagram is querying the 32-bit CPU_ABI1 and CPU_ABI2
     * constants, so the below is the correct CPU_ABI value on our 64-bit devices.
     *
     * @see https://developer.android.com/ndk/guides/abis.html
     *
     * @var string
     */
    const CPU_ABI = 'armeabi-v7a:armeabi';

    /*
     * LAST-UPDATED: MARCH 2017.
     */
    const DEVICES = [
        /* OnePlus 3T. Released: November 2016.
         * https://www.amazon.com/OnePlus-A3010-64GB-Gunmetal-International/dp/B01N4H00V8
         * https://www.handsetdetection.com/properties/devices/OnePlus/A3010
         */
        '24/7.0; 380dpi; 1080x1920; OnePlus; ONEPLUS A3010; OnePlus3T; qcom',

        /* LG G5. Released: April 2016.
         * https://www.amazon.com/LG-Unlocked-Phone-Titan-Warranty/dp/B01DJE22C2
         * https://www.handsetdetection.com/properties/devices/LG/RS988
         */
        '23/6.0.1; 640dpi; 1440x2392; LGE/lge; RS988; h1; h1',

        /* Huawei Mate 9 Pro. Released: January 2017.
         * https://www.amazon.com/Huawei-Dual-Sim-Titanium-Unlocked-International/dp/B01N9O1L6N
         * https://www.handsetdetection.com/properties/devices/Huawei/LON-L29
         */
        '24/7.0; 640dpi; 1440x2560; HUAWEI; LON-L29; HWLON; hi3660',

        /* ZTE Axon 7. Released: June 2016.
         * https://www.frequencycheck.com/models/OMYDK/zte-axon-7-a2017u-dual-sim-lte-a-64gb
         * https://www.handsetdetection.com/properties/devices/ZTE/A2017U
         */
        '23/6.0.1; 640dpi; 1440x2560; ZTE; ZTE A2017U; ailsa_ii; qcom',

        /* Samsung Galaxy S7 Edge SM-G935F. Released: March 2016.
         * https://www.amazon.com/Samsung-SM-G935F-Factory-Unlocked-Smartphone/dp/B01C5OIINO
         * https://www.handsetdetection.com/properties/devices/Samsung/SM-G935F
         */
        '23/6.0.1; 640dpi; 1440x2560; samsung; SM-G935F; hero2lte; samsungexynos8890',

        /* Samsung Galaxy S7 SM-G930F. Released: March 2016.
         * https://www.amazon.com/Samsung-SM-G930F-Factory-Unlocked-Smartphone/dp/B01J6MS6BC
         * https://www.handsetdetection.com/properties/devices/Samsung/SM-G930F
         */
        '23/6.0.1; 640dpi; 1440x2560; samsung; SM-G930F; herolte; samsungexynos8890',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-A520F; a5y17lte; samsungexynos7880',
        '22/5.1; 480dpi; 1080x1920; Meizu; m3 note; m3note; mt6755',
        '24/7.0; 640dpi; 1440x2560; samsung; SM-G925F; zerolte; samsungexynos7420',
        '23/6.0.1; 480dpi; 1080x1920; Xiaomi; Redmi Note 3; kenzo; qcom',
        '24/7.0; 480dpi; 1080x2076; samsung; SM-G950F; dreamlte; samsungexynos8895',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-A510F; a5xelte; samsungexynos7580',
        '24/7.0; 420dpi; 1080x2094; samsung; SM-G955F; dream2lte; samsungexynos8895',
        '24/7.0; 480dpi; 1080x1920; Xiaomi/xiaomi; Redmi Note 4; mido; qcom',
        '23/6.0.1; 480dpi; 1080x1920; Xiaomi; Redmi 4; markw; qcom',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-G930F; herolte; samsungexynos8890',
        '26/8.0.0; 480dpi; 1080x2076; samsung; SM-G950F; dreamlte; samsungexynos8895',
        '26/8.0.0; 480dpi; 1080x1920; samsung; SM-A520F; a5y17lte; samsungexynos7880',
        '26/8.0.0; 480dpi; 1080x1920; HUAWEI/HONOR; STF-L09; HWSTF; hi3660',
        '26/8.0.0; 420dpi; 1080x2094; samsung; SM-G955F; dream2lte; samsungexynos8895',
        '26/8.0.0; 480dpi; 1080x1920; Xiaomi/xiaomi; Mi A1; tissot_sprout; qcom',
        '26/8.0.0; 480dpi; 1080x1920; Xiaomi; MI 6; sagit; qcom',
        '24/7.0; 640dpi; 1440x2560; samsung; SM-G920F; zeroflte; samsungexynos7420',
        '25/7.1.1; 440dpi; 1080x1920; Xiaomi; MI MAX 2; oxygen; qcom',
        '24/7.0; 480dpi; 1080x1920; Xiaomi; MI 5s; capricorn; qcom',
        '25/7.1.2; 440dpi; 1080x2030; Xiaomi/xiaomi; Redmi 5 Plus; vince; qcom',
        '26/8.0.0; 640dpi; 1440x2768; samsung; SM-G950F; dreamlte; samsungexynos8895',
        '24/7.0; 420dpi; 1080x1920; samsung; SM-J730FM; j7y17lte; samsungexynos7870',
        '23/6.0.1; 480dpi; 1080x1920; samsung; SM-G900F; klte; qcom',
        '23/6.0; 480dpi; 1080x1920; Xiaomi; Redmi Note 4; nikel; mt6797',
        '23/6.0.1; 420dpi; 1080x1920; LeMobile/LeEco; Le X527; le_s2_ww; qcom',
        '26/8.0.0; 480dpi; 1080x2032; HUAWEI/HONOR; LLD-L31; HWLLD-H; hi6250',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-G935F; hero2lte; samsungexynos8890',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-G935W8; hero2ltebmc; samsungexynos8890',
        '26/8.0.0; 420dpi; 1080x2094; samsung; SM-G965F; star2lte; samsungexynos9810',
        '24/7.0; 640dpi; 1440x2560; samsung; SM-G935F; hero2lte; samsungexynos8890',
        '24/7.0; 420dpi; 1080x1920; samsung; SM-A720F; a7y17lte; samsungexynos7880',
        '23/6.0; 480dpi; 1080x1920; Xiaomi; Redmi Note 4X; nikel; mt6797',
        '26/8.0.0; 560dpi; 1440x2792; samsung; SM-G955F; dream2lte; samsungexynos8895',
        '24/7.0; 640dpi; 1440x2560; samsung; SM-G930F; herolte; samsungexynos8890',
        '23/6.0.1; 480dpi; 1080x1920; Xiaomi; Redmi Note 3; kate; qcom',
        '23/6.0; 480dpi; 1080x1920; Meizu; MX6; MX6; mt6797',
        '26/8.0.0; 480dpi; 1080x2076; samsung; SM-G950U; dreamqltesq; qcom',
        '26/8.0.0; 420dpi; 1080x2094; samsung; SM-N950F; greatlte; samsungexynos8895',
        '26/8.0.0; 420dpi; 1080x1920; OnePlus; ONEPLUS A5000; OnePlus5; qcom',
        '24/7.0; 640dpi; 1440x2560; samsung; SM-G920I; zeroflte; samsungexynos7420',
        '26/8.0.0; 480dpi; 1080x2150; HUAWEI; ANE-LX1; HWANE; hi6250',
        '24/7.0; 480dpi; 1080x2040; HUAWEI; RNE-L21; HWRNE; hi6250',
        '24/7.0; 420dpi; 1080x1920; samsung; SM-G930F; herolte; samsungexynos8890',
        '26/8.0.0; 420dpi; 1080x1920; samsung; SM-A520F; a5y17lte; samsungexynos7880',
        '26/8.0.0; 408dpi; 1080x1920; Xiaomi/xiaomi; Mi A1; tissot_sprout; qcom',
        '26/8.0.0; 480dpi; 1080x2076; samsung; SM-G960F; starlte; samsungexynos9810',
        '23/6.0; 480dpi; 1080x1920; Meizu; PRO 6; PRO6; mt6797',
        '24/7.0; 480dpi; 1080x1920; HUAWEI; VTR-L09; HWVTR; hi3660',
        '27/8.1.0; 480dpi; 1080x2136; Xiaomi/xiaomi; Mi A2 Lite; daisy_sprout; qcom',
        '27/8.1.0; 480dpi; 1080x2218; HUAWEI; SNE-LX1; HWSNE; kirin710',
        '26/8.0.0; 480dpi; 1080x1920; HUAWEI/HONOR; STF-L09; HWSTF; hi3660',
        '26/8.0.0; 480dpi; 1080x2032; HUAWEI/HONOR; LLD-L31; HWLLD-H; hi6250',
        '27/8.1.0; 480dpi; 1080x1920; Xiaomi/xiaomi; Mi A1; tissot_sprout; qcom',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-A510F; a5xelte; samsungexynos7580',
        '26/8.0.0; 480dpi; 1080x1920; samsung; SM-G930F; herolte; samsungexynos8890',
        '27/8.1.0; 440dpi; 1080x2030; Xiaomi/xiaomi; Redmi 5 Plus; vince; qcom',
    ];

    /**
     * Retrieve the device string for a random good device.
     *
     * @return string
     */
    public static function getRandomGoodDevice()
    {
        $randomIdx = array_rand(self::DEVICES, 1);

        return self::DEVICES[$randomIdx];
    }

    /**
     * Retrieve all good devices.
     *
     * @return string[]
     */
    public static function getAllGoodDevices()
    {
        return self::DEVICES;
    }

    /**
     * Checks whether a device string is one of the good devices.
     *
     * @param string $deviceString
     *
     * @return bool
     */
    public static function isGoodDevice(
        $deviceString)
    {
        return in_array($deviceString, self::DEVICES, true);
    }
}
