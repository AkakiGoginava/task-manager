<?php

if (!function_exists('fakeGeorgianText')) {
	function fakeGeorgianText(int $length = 100): string
	{
		$characters = array_map(
			fn ($code) => mb_chr($code, 'UTF-8'),
			range(0x10D0, 0x10F0)
		);

		$text = '';

		for ($i = 0; $i < $length; $i++) {
			$text .= $characters[array_rand($characters)];
			if (rand(0, 10) === 0) {
				$text .= ' ';
			}
		}

		return trim($text);
	}
}
