<?php

namespace Faker\Provider\ar_MA;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    // 01 is the most common prefix
    protected static $formats = [
        '+212 (0)1 ## ## ## ##',
        '+212 (0)1 ## ## ## ##',
        '+212 (0)2 ## ## ## ##',
        '+212 (0)3 ## ## ## ##',
        '+212 (0)4 ## ## ## ##',
        '+212 (0)5 ## ## ## ##',
        '+212 (0)6 ## ## ## ##',
        '+212 (0)7 {{phoneNumber07WithSeparator}}',
        '+212 (0)8 {{phoneNumber08WithSeparator}}',
        '+212 (0)9 ## ## ## ##',
        '+212 1 ## ## ## ##',
        '+212 1 ## ## ## ##',
        '+212 2 ## ## ## ##',
        '+212 3 ## ## ## ##',
        '+212 4 ## ## ## ##',
        '+212 5 ## ## ## ##',
        '+212 6 ## ## ## ##',
        '+212 7 {{phoneNumber07WithSeparator}}',
        '+212 8 {{phoneNumber08WithSeparator}}',
        '+212 9 ## ## ## ##',
        '01########',
        '01########',
        '02########',
        '03########',
        '04########',
        '05########',
        '06########',
        '07{{phoneNumber07}}',
        '08{{phoneNumber08}}',
        '09########',
        '01 ## ## ## ##',
        '01 ## ## ## ##',
        '02 ## ## ## ##',
        '03 ## ## ## ##',
        '04 ## ## ## ##',
        '05 ## ## ## ##',
        '06 ## ## ## ##',
        '07 {{phoneNumber07WithSeparator}}',
        '08 {{phoneNumber08WithSeparator}}',
        '09 ## ## ## ##',
    ];

    // Mobile phone numbers start by 06 and 07
    // 06 is the most common prefix
    protected static $mobileFormats = [
        '+212 (0)6 ## ## ## ##',
        '+212 6 ## ## ## ##',
        '+212 (0)7 {{phoneNumber07WithSeparator}}',
        '+212 7 {{phoneNumber07WithSeparator}}',
        '06########',
        '07{{phoneNumber07}}',
        '06 ## ## ## ##',
        '07 {{phoneNumber07WithSeparator}}',
    ];

    protected static $serviceFormats = [
        '+212 (0)8 {{phoneNumber08WithSeparator}}',
        '+212 8 {{phoneNumber08WithSeparator}}',
        '08 {{phoneNumber08WithSeparator}}',
        '08{{phoneNumber08}}',
    ];

    protected static $e164Formats = [
        '+212##########',
    ];

    public function phoneNumber07()
    {
        $phoneNumber = $this->phoneNumber07WithSeparator();

        return str_replace(' ', '', $phoneNumber);
    }

    public function phoneNumber07WithSeparator()
    {
        $phoneNumber = $this->generator->numberBetween(3, 9);
        $phoneNumber .= $this->numerify('# ## ## ##');

        return $phoneNumber;
    }

    public function phoneNumber08()
    {
        $phoneNumber = $this->phoneNumber08WithSeparator();

        return str_replace(' ', '', $phoneNumber);
    }

    public function phoneNumber08WithSeparator()
    {
        $regex = '([012]{1}\d{1}|(9[1-357-9])( \d{2}){3}';

        return $this->regexify($regex);
    }

    /**
     * @example '0601020304'
     */
    public function mobileNumber()
    {
        $format = static::randomElement(static::$mobileFormats);

        return static::numerify($this->generator->parse($format));
    }

    /**
     * @example '0891951357'
     */
    public function serviceNumber()
    {
        $format = static::randomElement(static::$serviceFormats);

        return static::numerify($this->generator->parse($format));
    }
}
