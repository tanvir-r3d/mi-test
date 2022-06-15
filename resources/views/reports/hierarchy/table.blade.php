<br>
<ul>
    @foreach ($account_heads as $group)
        <li>{{ $group['head_name'] }} -
            {{ $group['total_amount'] }}
        </li>
        <ul>
            @foreach ($group['childs'] as $levelTwoGroup)
                <li>{{ $levelTwoGroup['head_name'] }} -
                    {{ $levelTwoGroup['total_amount'] }}
                </li>
                <ul>
                    @foreach ($levelTwoGroup['childs'] as $levelThreeGroup)
                        <li>{{ $levelThreeGroup['head_name'] }} -
                            {{ $levelThreeGroup['total_amount'] }}
                        </li>
                        <ul>
                            @foreach ($levelThreeGroup['childs'] as $account)
                                <li>{{ $account['head_name'] }} -
                                    {{ $account['total_amount'] }}
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    @endforeach
</ul>
