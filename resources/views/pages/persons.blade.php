@extends('defaults.default')

@section('content')
    <header>
        <nav>
            <a href="/create">Add new person</a>
        </nav>
    </header>
    <section>
        <h2>Persons list</h2>
        @if($data)
            <table>
                <thead>
                    <tr>
                        <th style="width: 150px; min-width: 150px; max-width: 150px;">Name</th>
                        <th>Emails</th>
                        <th>Mobile num.</th>
                        <th>Telephone num.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $person)
                        <tr>
                            <td style="width: 150px; min-width: 150px; max-width: 150px;">
                                #{{ $person->id }}<strong style="display: block">{{ $person->first_name }}</strong>
                                <span style="font-size: 0.8rem">{{ $person->first_name }} {{ $person->middle_name }} {{ $person->last_name }}</span>
                            </td>
                            <td>
                                <ol>
                                    @foreach($person->personEmails as $user)
                                        <li style="font-size: 0.8rem">{{ $user->email }}</li>
                                    @endforeach
                                </ol>
                            </td>
                            <td>
                                <ol>
                                    @foreach($person->personMobiles as $user)
                                        <li style="font-size: 0.8rem">{{ $user->mobile_number }}</li>
                                    @endforeach
                                </ol>
                            </td>
                            <td>
                                <ol>
                                    @foreach($person->personTelephones as $user)
                                        <li style="font-size: 0.8rem">{{ $user->telephone_number }}</li>
                                    @endforeach
                                </ol>
                            </td>
                            <td style="text-align: center">
                                <a href="{{ route('person.edit', $person) }}" class="button" style="background-color: #406080; border-color: #406080; padding: 0.5rem; display: inline-block; width:35px"><i style="color: #fff" class="fa-solid fa-pencil-alt"></i></a>
                                <form action="{{ route('person.destroy', $person->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this person?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="button" style="background-color: #E63939; border-color: #E63939; display: block;" type="submit" title="Delete"><i style="color: #fff" class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <section>
                <h2>Sorry we could not find any records</h2>
                <p>There are no persons in database yet! Be the first to insert one.</p>
            </section>
        @endif
    </section>
@endsection
